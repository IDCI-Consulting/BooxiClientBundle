<?php

namespace IDCI\Bundle\BooxiClientBundle\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use IDCI\Bundle\BooxiClientBundle\Model\Booking;
use IDCI\Bundle\BooxiClientBundle\Model\GroupEventCollection;
use IDCI\Bundle\BooxiClientBundle\Model\MerchantAvailabilityResponse;
use IDCI\Bundle\BooxiClientBundle\Model\ServiceAvailabilityResponse;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class BooxiApiClient
{
    private SerializerInterface $serializer;
    private LoggerInterface $logger;
    private ?AdapterInterface $cache = null;
    private ?ClientInterface $httpClient = null;
    private ?string $apiKey = null;
    private ?string $partnerKey = null;

    public function __construct(
        SerializerInterface $serializer,
        LoggerInterface $logger,
        ?string $apiKey = null,
        ?string $partnerKey = null,
    ) {
        $this->serializer = $serializer;
        $this->logger = $logger;
        $this->apiKey = $apiKey;
        $this->partnerKey = $partnerKey;
    }

    public function setHttpClient(ClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

    public function setCache(AdapterInterface $cache): void
    {
        $this->cache = $cache;
    }

    /**
     * Availability. @see https://api.booxi.eu/doc/booking.html#/Availability
     */

    public function getGroupEvents(array $options = []): ?GroupEventCollection
    {
        $resolver = (new OptionsResolver())
            ->setRequired('from')->setAllowedTypes('from', ['string', 'DateTimeInterface'])
                ->setNormalizer('from', function (Options $options, $value) {
                    if ($value instanceof \DateTimeInterface) {
                        $value = $value->format(\DateTime::RFC3339);
                    }

                    return $value;
                })
            ->setRequired('to')->setAllowedTypes('to', ['string', 'DateTimeInterface'])
                ->setNormalizer('to', function (Options $options, $value) {
                    if ($value instanceof \DateTimeInterface) {
                        $value = $value->format(\DateTime::RFC3339);
                    }

                    return $value;
                })
            ->setDefined('keywords')->setAllowedTypes('keywords', ['string'])
            ->setDefined('serviceId')->setAllowedTypes('serviceId', ['int'])
            ->setDefined('staffId')->setAllowedTypes('staffId', ['int'])
            ->setDefined('minAvailablePlaces')->setAllowedTypes('minAvailablePlaces', ['int'])
            ->setDefined('language')->setAllowedTypes('language', ['string'])
            ->setDefined('offset')->setAllowedTypes('offset', ['int'])
            ->setDefined('limit')->setAllowedTypes('limit', ['int'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'groupEvent', [
                'headers' => [
                    'Booxi-APIKey' => $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), GroupEventCollection::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $resolvedOptions);
        }

        return null;
    }

    // TODO: getGroupEvent(int $groupEventId) | GET /groupEvent/{groupEventId} | apiKey

    public function getMerchantAvailability(array $options = []): ?MerchantAvailabilityResponse
    {
        $resolver = (new OptionsResolver())
            ->setDefined('merchantId')->setAllowedTypes('merchantId', ['int'])
            ->setDefined('partnerId')->setAllowedTypes('partnerId', ['int'])
            ->setRequired('from')->setAllowedTypes('from', ['string', 'DateTimeInterface'])
                ->setNormalizer('from', function (Options $options, $value) {
                    if ($value instanceof \DateTimeInterface) {
                        $value = $value->format(\DateTime::RFC3339);
                    }

                    return $value;
                })
            ->setRequired('to')->setAllowedTypes('to', ['string', 'DateTimeInterface'])
                ->setNormalizer('to', function (Options $options, $value) {
                    if ($value instanceof \DateTimeInterface) {
                        $value = $value->format(\DateTime::RFC3339);
                    }

                    return $value;
                })
            ->setDefined('serviceKeyword')->setAllowedTypes('serviceKeyword', ['string'])
            ->setDefined('serviceBookingMethod')->setAllowedValues('serviceBookingMethod', ['Appointment', 'GroupReservation', 'Rental'])
            ->setDefined('language')->setAllowedTypes('language', ['string'])
            ->setDefined('cursor')->setAllowedTypes('cursor', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'merchantAvailability', [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), MerchantAvailabilityResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $resolvedOptions);
        }

        return null;
    }

    public function getServiceAvailability(int $serviceId, array $options = []): ?ServiceAvailabilityResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired('from')->setAllowedTypes('from', ['string', 'DateTimeInterface'])
                ->setNormalizer('from', function (Options $options, $value) {
                    if ($value instanceof \DateTimeInterface) {
                        $value = $value->format(\DateTime::RFC3339);
                    }

                    return $value;
                })
            ->setRequired('to')->setAllowedTypes('to', ['string', 'DateTimeInterface'])
                ->setNormalizer('to', function (Options $options, $value) {
                    if ($value instanceof \DateTimeInterface) {
                        $value = $value->format(\DateTime::RFC3339);
                    }

                    return $value;
                })
            ->setDefined('staffId')->setAllowedTypes('staffId', ['int'])
            ->setDefined('language')->setAllowedTypes('language', ['string'])
            ->setDefined('cursor')->setAllowedTypes('cursor', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', sprintf('service/%s/availability', $serviceId), [
                'headers' => [
                    'Booxi-APIKey' => $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceAvailabilityResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $resolvedOptions);
        }

        return null;
    }

    /**
     * Booking. @see https://api.booxi.eu/doc/booking.html#/Booking
     */

    // TODO: getBookings() | GET /booking | partnerKey

    public function createBooking(array|Booking $booking, array $options = []): ?Booking
    {
        if ($booking instanceof Booking) {
            $booking = json_decode($this->serializer->serialize($booking, 'json'), true);
        }

        $resolver = (new OptionsResolver())
            ->setDefined('rules')->setAllowedTypes('rules', ['array'])
            ->setDefined('ignoreError')->setAllowedTypes('ignoreError', ['array'])
            ->setDefined('language')->setAllowedTypes('language', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('POST', 'booking', [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
                'body' => json_encode($booking),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Booking::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $booking);
        }

        return null;
    }

    // TODO: getBooking(int $bookingId) | GET /booking/{bookingId} | partnerKey
    // TODO: updateBooking(int $bookingId) | PUT /booking/{bookingId} | partnerKey
    // TODO: payBooking(int $bookingId, int $paymentId) | PUT /booking/{bookingId}/payment/{paymentId} | partnerKey

    /**
     * Book now. @see https://api.booxi.eu/doc/booking.html#/Book%20Now
     */

    public function getBookNowMerchant(): Response // TODO: finish
    {
        $response = $this->httpClient->request('GET', 'merchant', [
            'headers' => [
                'Booxi-APIKey' => $this->partnerKey,
            ],
        ]);

        return $response;
    }

    // TODO: getBookNowServices() | GET /service | apiKey
    // TODO: getBookNowServiceCategories() | GET /serviceCategory | apiKey
    // TODO: getBookNowServiceCustomizations() | GET /serviceCustomization | apiKey
    // TODO: getBookNowStaffs() | GET /staff | apiKey

    /**
     * Calendar. @see https://api.booxi.eu/doc/booking.html#/Calendar
     */

    // TODO: getCalendar() | GET /calendar | partnerKey
    // TODO: getTimeSlots() | GET /timeSlot | partnerKey
    // TODO: createTimeSlot() | POST /timeSlot | partnerKey
    // TODO: getTimeSlot(int $timeSlotId) | GET /timeSlot/{timeSlotId} | partnerKey
    // TODO: deleteTimeSlot(int $timeSlotId) | DELETE /timeSlot/{timeSlotId} | partnerKey

    /**
     * Client. @see https://api.booxi.eu/doc/booking.html#/Client
     */

    // TODO: getClients() | GET /client | partnerKey
    // TODO: createClient() | POST /client | partnerKey
    // TODO: getClient(int $clientId) | GET /client/{clientId} | partnerKey
    // TODO: updateClient(int $clientId) | PUT /client/{clientId} | partnerKey
    // TODO: deleteClient(int $clientId) | DELETE /client/{clientId} | partnerKey
    // TODO: getClientModuleLink(int $clientId, int $moduleId) | GET /client/{clientId}/moduleLink/{moduleId} | partnerKey
    // TODO: updateClientModuleLink(int $clientId, int $moduleId) | PUT /client/{clientId}/moduleLink/{moduleId} | partnerKey

    /**
     * Merchant. @see https://api.booxi.eu/doc/booking.html#/Merchant
     */

    // TODO: getMerchants() | GET /merchant/list | partnerKey
    // TODO: searchMerchants() | GET /merchant/search | partnerKey
    // TODO: getMerchant(int $merchantId)  | GET /merchant/{merchantId} | partnerKey
    // TODO: getMerchantModuleLink(int $merchantId, int $moduleLink)  | GET /merchant/{merchantId}/moduleLink/{moduleId} | partnerKey
    // TODO: updateMerchantModuleLink(int $merchantId, int $moduleLink)  | PUT /merchant/{merchantId}/moduleLink/{moduleId} | partnerKey

    /**
     * Schedule. @see https://api.booxi.eu/doc/booking.html#/Schedule
     */

    // TODO: getMerchantSchedules(int $merchantId) | GET /merchant/{merchantId}/schedule | partnerKey
    // TODO: createMerchantSchedule(int $merchantId) | POST /merchant/{merchantId}/schedule | partnerKey
    // TODO: getMerchantSchedule(int $merchantId, int $scheduleId) | GET /merchant/{merchantId}/schedule/{scheduleId} | partnerKey
    // TODO: updateMerchantSchedule(int $merchantId, int $scheduleId) | PUT /merchant/{merchantId}/schedule/{scheduleId} | partnerKey
    // TODO: deleteMerchantSchedule(int $merchantId, int $scheduleId) | DELETE /merchant/{merchantId}/schedule/{scheduleId} | partnerKey

    // TODO: getStaffSchedules(int $staffId) | GET /staff/{staffId}/schedule | partnerKey
    // TODO: createStaffSchedule(int $staffId) | POST /staff/{staffId}/schedule | partnerKey
    // TODO: getStaffSchedule(int $staffId, int $scheduleId) | GET /staff/{staffId}/schedule/{scheduleId} | partnerKey
    // TODO: updateStaffSchedule(int $staffId, int $scheduleId) | PUT /staff/{staffId}/schedule/{scheduleId} | partnerKey
    // TODO: deleteStaffSchedule(int $staffId, int $scheduleId) | DELETE /staff/{staffId}/schedule/{scheduleId} | partnerKey

    /**
     * Service. @see https://api.booxi.eu/doc/booking.html#/Service
     */

    // TODO: getServices() | GET /service/list | partnerKey
    // TODO: createService() | POST /service | partnerKey
    // TODO: getService(int $serviceId)  | GET /service/{serviceId} | partnerKey
    // TODO: updateService(int $serviceId)  | PUT /service/{serviceId} | partnerKey
    // TODO: deleteService(int $serviceId)  | DELETE /service/{serviceId} | partnerKey
    // TODO: uploadServiceImage(int $serviceId)  | PUT /service/{serviceId}/image | partnerKey
    // TODO: getServiceModuleLink(int $serviceId, int $moduleLink)  | GET /service/{serviceId}/moduleLink/{moduleId} | partnerKey
    // TODO: updateServiceModuleLink(int $serviceId, int $moduleLink)  | PUT /service/{serviceId}/moduleLink/{moduleId} | partnerKey
    // TODO: getServiceTranslations(int $serviceId)  | GET /service/{serviceId}/translations | partnerKey
    // TODO: updateServiceTranslations(int $serviceId)  | PUT /service/{serviceId}/translations | partnerKey

    /**
     * Service Category. @see https://api.booxi.eu/doc/booking.html#/Service%20Category
     */

    // TODO: getServiceCategories() | GET /serviceCategory/list | partnerKey
    // TODO: createServiceCategory() | POST /serviceCategory | partnerKey
    // TODO: getServiceCategory(int $serviceCategoryId)  | GET /serviceCategory/{serviceCategoryId} | partnerKey
    // TODO: updateServiceCategory(int $serviceCategoryId)  | PUT /serviceCategory/{serviceCategoryId} | partnerKey
    // TODO: deleteServiceCategory(int $serviceCategoryId)  | DELETE /serviceCategory/{serviceCategoryId} | partnerKey
    // TODO: uploadServiceCategoryImage(int $serviceCategoryId)  | PUT /serviceCategory/{serviceCategoryId}/image | partnerKey
    // TODO: getServiceCategoryModuleLink(int $serviceCategoryId, int $moduleLink)  | GET /serviceCategory/{serviceCategoryId}/moduleLink/{moduleId} | partnerKey
    // TODO: updateServiceCategoryModuleLink(int $serviceCategoryId, int $moduleLink)  | PUT /serviceCategory/{serviceCategoryId}/moduleLink/{moduleId} | partnerKey
    // TODO: getServiceCategoryTranslations(int $serviceCategoryId)  | GET /serviceCategory/{serviceCategoryId}/translations | partnerKey
    // TODO: updateServiceCategoryTranslations(int $serviceCategoryId)  | PUT /serviceCategory/{serviceCategoryId}/translations | partnerKey

    /**
     * Staff. @see https://api.booxi.eu/doc/booking.html#/Staff
     */

    // TODO: getStaffs() | GET /staff/list | partnerKey
    // TODO: createStaff(int $merchantId) | POST /staff/{merchantId} | partnerKey
    // TODO: getStaff(int $staffId)  | GET /staff/{staffId} | partnerKey
    // TODO: updateStaff(int $staffId)  | PUT /staff/{staffId} | partnerKey
    // TODO: deleteStaff(int $staffId)  | DELETE /staff/{staffId} | partnerKey
    // TODO: getStaffModuleLink(int $staffId, int $moduleLink)  | GET /staff/{staffId}/moduleLink/{moduleId} | partnerKey
    // TODO: updateStaffModuleLink(int $staffId, int $moduleLink)  | PUT /staff/{staffId}/moduleLink/{moduleId} | partnerKey
    // TODO: uploadStaffImage(int $staffId)  | PUT /staff/{staffId}/image | partnerKey

    /**
     * User Access. @see https://api.booxi.eu/doc/booking.html#/User%20Access
     */

    // TODO: getPasswordRecovery(int $staffId, int $recoveryId) | GET /staff/{staffId}/passwordRecovery/{recoveryId} | partnerKey
    // TODO: createPasswordRecovery(int $staffId, int $recoveryId) | POST /staff/{staffId}/passwordRecovery | partnerKey
    // TODO: getStaffUserAccess(int $staffId) | GET /staff/{staffId}/userAccess | partnerKey
    // TODO: updateStaffUserAccess(int $staffId) | POST /staff/{staffId}/userAccess | partnerKey

    /**
     * Utils
     */

    private function logRequestException(RequestException $e, array $options = []): void
    {
        $this->logger->error(
            sprintf(
                'method : %s, url : %s, status : %s, data : %s, message : %s',
                $e->getRequest()->getMethod(),
                $e->getRequest()->getUri(),
                null != $e->getResponse() ? (string) $e->getResponse()->getStatusCode() : null,
                json_encode($options),
                null != $e->getResponse() ? (string) $e->getResponse()->getBody() : $e->getMessage()
            )
        );
    }
}