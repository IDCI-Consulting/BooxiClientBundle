<?php

namespace IDCI\Bundle\BooxiClientBundle\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use IDCI\Bundle\BooxiClientBundle\Model\Booking;
use IDCI\Bundle\BooxiClientBundle\Model\BookingFindResponse;
use IDCI\Bundle\BooxiClientBundle\Model\BookingMethod;
use IDCI\Bundle\BooxiClientBundle\Model\BookingPaymentResponse;
use IDCI\Bundle\BooxiClientBundle\Model\BookingResponse;
use IDCI\Bundle\BooxiClientBundle\Model\BookingStatus;
use IDCI\Bundle\BooxiClientBundle\Model\BookNowMerchant;
use IDCI\Bundle\BooxiClientBundle\Model\BookNowServiceCategoryCollection;
use IDCI\Bundle\BooxiClientBundle\Model\BookNowServiceCustomizationCollection;
use IDCI\Bundle\BooxiClientBundle\Model\BookNowStaffCollection;
use IDCI\Bundle\BooxiClientBundle\Model\CalendarEventListResponse;
use IDCI\Bundle\BooxiClientBundle\Model\Client;
use IDCI\Bundle\BooxiClientBundle\Model\ClientFindResponse;
use IDCI\Bundle\BooxiClientBundle\Model\ClientModuleLink;
use IDCI\Bundle\BooxiClientBundle\Model\ClientModuleLinkResponse;
use IDCI\Bundle\BooxiClientBundle\Model\GroupEvent;
use IDCI\Bundle\BooxiClientBundle\Model\GroupEventCollection;
use IDCI\Bundle\BooxiClientBundle\Model\Merchant;
use IDCI\Bundle\BooxiClientBundle\Model\MerchantAvailabilityResponse;
use IDCI\Bundle\BooxiClientBundle\Model\MerchantCollection;
use IDCI\Bundle\BooxiClientBundle\Model\MerchantFindResponse;
use IDCI\Bundle\BooxiClientBundle\Model\MerchantModuleLink;
use IDCI\Bundle\BooxiClientBundle\Model\MerchantModuleLinkResponse;
use IDCI\Bundle\BooxiClientBundle\Model\OnlineStatus;
use IDCI\Bundle\BooxiClientBundle\Model\PasswordRecovery;
use IDCI\Bundle\BooxiClientBundle\Model\Payment;
use IDCI\Bundle\BooxiClientBundle\Model\PersonnelType;
use IDCI\Bundle\BooxiClientBundle\Model\Schedule;
use IDCI\Bundle\BooxiClientBundle\Model\ScheduleListResponse;
use IDCI\Bundle\BooxiClientBundle\Model\Service;
use IDCI\Bundle\BooxiClientBundle\Model\ServiceAvailabilityResponse;
use IDCI\Bundle\BooxiClientBundle\Model\ServiceCategory;
use IDCI\Bundle\BooxiClientBundle\Model\ServiceCategoryListResponse;
use IDCI\Bundle\BooxiClientBundle\Model\ServiceCategoryModuleLink;
use IDCI\Bundle\BooxiClientBundle\Model\ServiceCategoryModuleLinkResponse;
use IDCI\Bundle\BooxiClientBundle\Model\ServiceCategoryTranslations;
use IDCI\Bundle\BooxiClientBundle\Model\ServiceCollection;
use IDCI\Bundle\BooxiClientBundle\Model\ServiceListResponse;
use IDCI\Bundle\BooxiClientBundle\Model\ServiceModuleLink;
use IDCI\Bundle\BooxiClientBundle\Model\ServiceModuleLinkResponse;
use IDCI\Bundle\BooxiClientBundle\Model\ServiceTranslations;
use IDCI\Bundle\BooxiClientBundle\Model\Staff;
use IDCI\Bundle\BooxiClientBundle\Model\StaffListResponse;
use IDCI\Bundle\BooxiClientBundle\Model\StaffModuleLink;
use IDCI\Bundle\BooxiClientBundle\Model\StaffModuleLinkResponse;
use IDCI\Bundle\BooxiClientBundle\Model\StaffUserAccess;
use IDCI\Bundle\BooxiClientBundle\Model\StaffUserAccessResponse;
use IDCI\Bundle\BooxiClientBundle\Model\TimeSlot;
use IDCI\Bundle\BooxiClientBundle\Model\TimeSlotFindResponse;
use IDCI\Bundle\BooxiClientBundle\Model\TimeSlotResponse;
use IDCI\Bundle\BooxiClientBundle\Model\TimeSlotType;
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
     * Availability. @see https://api.booxi.eu/doc/booking.html#/Availability.
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
            $this->logRequestException($e);
        }

        return null;
    }

    public function getGroupEvent(int $groupEventId, array $options = []): ?GroupEvent
    {
        $resolver = (new OptionsResolver())
            ->setDefined('language')->setAllowedTypes('language', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', sprintf('groupEvent/%s', $groupEventId), [
                'headers' => [
                    'Booxi-APIKey' => $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), GroupEvent::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

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
            ->setDefined('serviceBookingMethod')->setAllowedValues('serviceBookingMethod', BookingMethod::cases())
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
            $this->logRequestException($e);
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
            $this->logRequestException($e);
        }

        return null;
    }

    /**
     * Booking. @see https://api.booxi.eu/doc/booking.html#/Booking.
     */
    public function getBookings(array $options = []): ?BookingFindResponse
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
            ->setDefined('clientId')->setAllowedTypes('clientId', ['int'])
            ->setDefined('merchantId')->setAllowedTypes('merchantId', ['int'])
            ->setDefined('bookingMethod')->setAllowedTypes('bookingMethod', ['array'])
            ->setDefined('order')->setAllowedTypes('order', ['string'])
            ->setDefined('language')->setAllowedTypes('language', ['string'])
            ->setDefined('cursor')->setAllowedTypes('cursor', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'booking', [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), BookingFindResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

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

    public function getBooking(string $bookingId, array $options = []): ?BookingResponse
    {
        $resolver = (new OptionsResolver())
            ->setDefined('language')->setAllowedTypes('language', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', sprintf('booking/%s', $bookingId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), BookingResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function updateBooking(string $bookingId, array|Booking $booking, array $options = []): ?Booking
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
            $response = $this->httpClient->request('PUT', sprintf('booking/%s', $bookingId), [
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

    public function payBooking(string $bookingId, string $paymentId, array|Payment $payment, array $options = []): ?BookingPaymentResponse
    {
        if ($payment instanceof Payment) {
            $payment = json_decode($this->serializer->serialize($payment, 'json'), true);
        }

        $resolver = (new OptionsResolver())
            ->setDefined('language')->setAllowedTypes('language', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('PUT', sprintf('booking/%s/payment/%s', $bookingId, $paymentId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
                'body' => json_encode($payment),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), BookingPaymentResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $payment);
        }

        return null;
    }

    /**
     * Book now. @see https://api.booxi.eu/doc/booking.html#/Book%20Now.
     */
    public function getBookNowMerchant(array $options = []): ?BookNowMerchant
    {
        $resolver = (new OptionsResolver())
            ->setDefined('language')->setAllowedTypes('language', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'merchant', [
                'headers' => [
                    'Booxi-APIKey' => $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), BookNowMerchant::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function getBookNowServices(array $options = []): ?ServiceCollection
    {
        $resolver = (new OptionsResolver())
            ->setDefined('staffId')->setAllowedTypes('staffId', ['int'])
            ->setDefined('bookingMethod')->setAllowedValues('bookingMethod', BookingMethod::cases())
            ->setDefined('keywords')->setAllowedTypes('keywords', ['string'])
            ->setDefined('language')->setAllowedTypes('language', ['string'])
            ->setDefined('offset')->setAllowedTypes('offset', ['int'])
            ->setDefined('limit')->setAllowedTypes('limit', ['int'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'service', [
                'headers' => [
                    'Booxi-APIKey' => $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceCollection::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function getBookNowServiceCategories(array $options = []): ?BookNowServiceCategoryCollection
    {
        $resolver = (new OptionsResolver())
            ->setDefined('keywords')->setAllowedTypes('keywords', ['string'])
            ->setDefined('language')->setAllowedTypes('language', ['string'])
            ->setDefined('offset')->setAllowedTypes('offset', ['int'])
            ->setDefined('limit')->setAllowedTypes('limit', ['int'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'serviceCategory', [
                'headers' => [
                    'Booxi-APIKey' => $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), BookNowServiceCategoryCollection::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function getBookNowServiceCustomizations(array $options = []): ?BookNowServiceCustomizationCollection
    {
        $resolver = (new OptionsResolver())
            ->setDefined('serviceId')->setAllowedTypes('serviceId', ['int'])
            ->setDefined('staffId')->setAllowedTypes('staffId', ['int'])
            ->setDefined('language')->setAllowedTypes('language', ['string'])
            ->setDefined('offset')->setAllowedTypes('offset', ['int'])
            ->setDefined('limit')->setAllowedTypes('limit', ['int'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'serviceCustomization', [
                'headers' => [
                    'Booxi-APIKey' => $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), BookNowServiceCustomizationCollection::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function getBookNowStaffs(array $options = []): ?BookNowStaffCollection
    {
        $resolver = (new OptionsResolver())
            ->setDefined('serviceId')->setAllowedTypes('serviceId', ['int'])
            ->setDefined('language')->setAllowedTypes('language', ['string'])
            ->setDefined('offset')->setAllowedTypes('offset', ['int'])
            ->setDefined('limit')->setAllowedTypes('limit', ['int'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'staff', [
                'headers' => [
                    'Booxi-APIKey' => $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), BookNowStaffCollection::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    /**
     * Calendar. @see https://api.booxi.eu/doc/booking.html#/Calendar.
     */
    public function getCalendar(array $options = []): ?CalendarEventListResponse
    {
        $resolver = (new OptionsResolver())
            ->setDefined('from')->setAllowedTypes('from', ['string', 'DateTimeInterface'])
                ->setNormalizer('from', function (Options $options, $value) {
                    if ($value instanceof \DateTimeInterface) {
                        $value = $value->format(\DateTime::RFC3339);
                    }

                    return $value;
                })
            ->setDefined('to')->setAllowedTypes('to', ['string', 'DateTimeInterface'])
                ->setNormalizer('to', function (Options $options, $value) {
                    if ($value instanceof \DateTimeInterface) {
                        $value = $value->format(\DateTime::RFC3339);
                    }

                    return $value;
                })
            ->setDefined('staffId')->setAllowedTypes('staffId', ['int'])
            ->setDefined('eventType')->setAllowedTypes('eventType', ['array'])
            ->setDefined('include')->setAllowedTypes('include', ['array'])
            ->setDefined('language')->setAllowedTypes('language', ['string'])
            ->setDefined('cursor')->setAllowedTypes('cursor', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'calendar', [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), CalendarEventListResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function getTimeSlots(array $options = []): ?TimeSlotFindResponse
    {
        $resolver = (new OptionsResolver())
            ->setDefined('from')->setAllowedTypes('from', ['string', 'DateTimeInterface'])
                ->setNormalizer('from', function (Options $options, $value) {
                    if ($value instanceof \DateTimeInterface) {
                        $value = $value->format(\DateTime::RFC3339);
                    }

                    return $value;
                })
            ->setDefined('to')->setAllowedTypes('to', ['string', 'DateTimeInterface'])
                ->setNormalizer('to', function (Options $options, $value) {
                    if ($value instanceof \DateTimeInterface) {
                        $value = $value->format(\DateTime::RFC3339);
                    }

                    return $value;
                })
            ->setDefined('staffId')->setAllowedTypes('staffId', ['int'])
            ->setDefined('type')->setAllowedValues('type', TimeSlotType::cases())
            ->setDefined('availabilityTags')->setAllowedTypes('availabilityTags', ['string'])
            ->setDefined('language')->setAllowedTypes('language', ['string'])
            ->setDefined('cursor')->setAllowedTypes('cursor', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'calendar', [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), TimeSlotFindResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function createTimeSlot(TimeSlot|array $timeSlot, array $options = []): ?TimeSlotResponse
    {
        if ($timeSlot instanceof TimeSlot) {
            $timeSlot = json_decode($this->serializer->serialize($timeSlot, 'json'), true);
        }

        $resolver = (new OptionsResolver())
            ->setDefined('language')->setAllowedTypes('language', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('POST', 'timeSlot', [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
                'body' => json_encode($timeSlot),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), TimeSlotResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $timeSlot);
        }

        return null;
    }

    public function getTimeSlot(string $timeSlotId, array $options = []): ?TimeSlotResponse
    {
        $resolver = (new OptionsResolver())
            ->setDefined('language')->setAllowedTypes('language', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', sprintf('timeSlot/%s', $timeSlotId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), TimeSlotResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function deleteTimeSlot(string $timeSlotId, array $options = []): ?TimeSlotResponse
    {
        $resolver = (new OptionsResolver())
            ->setDefined('language')->setAllowedTypes('language', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('DELETE', sprintf('timeSlot/%s', $timeSlotId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), TimeSlotResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    /**
     * Client. @see https://api.booxi.eu/doc/booking.html#/Client.
     */
    public function getClients(array $options = []): ?ClientFindResponse
    {
        $resolver = (new OptionsResolver())
            ->setDefined('moduleId')->setAllowedTypes('moduleId', ['string'])
            ->setDefined('externalId')->setAllowedTypes('externalId', ['string'])
            ->setDefined('merchantId')->setAllowedTypes('merchantId', ['int'])
            ->setDefined('firstName')->setAllowedTypes('firstName', ['string'])
            ->setDefined('lastName')->setAllowedTypes('lastName', ['string'])
            ->setDefined('email')->setAllowedTypes('email', ['string'])
            ->setDefined('phoneNumber')->setAllowedTypes('phoneNumber', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'client', [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ClientFindResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function createClient(Client|array $client): ?Client
    {
        if ($client instanceof Client) {
            $client = json_decode($this->serializer->serialize($client, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('POST', 'client', [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($client),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Client::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $client);
        }

        return null;
    }

    public function getClient(int $clientId): ?Client
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('client/%s', $clientId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Client::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function updateClient(int $clientId, array|Client $client): ?Client
    {
        if ($client instanceof Client) {
            $client = json_decode($this->serializer->serialize($client, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('PUT', sprintf('client/%s', $clientId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($client),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Client::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $client);
        }

        return null;
    }

    public function deleteClient(int $clientId, array $options = []): ?Client
    {
        $resolver = (new OptionsResolver())
            ->setDefined('ignoreError')->setAllowedTypes('ignoreError', ['bool'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('DELETE', sprintf('client/%s', $clientId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Client::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function getClientModuleLink(int $clientId, string $moduleId): ?ClientModuleLinkResponse
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('client/%s/moduleLink/%s', $clientId, $moduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ClientModuleLinkResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function updateClientModuleLink(int $clientId, string $moduleId, array|ClientModuleLink $clientModuleLink): ?ClientModuleLinkResponse
    {
        if ($clientModuleLink instanceof ClientModuleLink) {
            $clientModuleLink = json_decode($this->serializer->serialize($clientModuleLink, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('PUT', sprintf('client/%s/moduleLink/%s', $clientId, $moduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($clientModuleLink),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ClientModuleLinkResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $clientModuleLink);
        }

        return null;
    }

    /**
     * Merchant. @see https://api.booxi.eu/doc/booking.html#/Merchant.
     */
    public function getMerchants(array $options = []): ?MerchantCollection
    {
        $resolver = (new OptionsResolver())
            ->setDefined('groupId')->setAllowedTypes('groupId', ['int'])
            ->setDefined('language')->setAllowedTypes('language', ['string'])
            ->setDefined('offset')->setAllowedTypes('offset', ['int'])
            ->setDefined('limit')->setAllowedTypes('limit', ['int'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'merchant/list', [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), MerchantCollection::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function searchMerchants(array $options = []): ?MerchantFindResponse
    {
        $resolver = (new OptionsResolver())
            ->setDefined('groupId')->setAllowedTypes('groupId', ['int'])
            ->setDefined('moduleId')->setAllowedTypes('moduleId', ['string'])
            ->setDefined('externalId')->setAllowedTypes('externalId', ['string'])
            ->setDefined('cursor')->setAllowedTypes('cursor', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'merchant/search', [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), MerchantFindResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function getMerchant(int $merchantId): ?Merchant
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('merchant/%s', $merchantId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Merchant::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function getMerchantModuleLink(int $merchantId, string $moduleId): ?MerchantModuleLinkResponse
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('merchant/%s/moduleLink/%s', $merchantId, $moduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), MerchantModuleLinkResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function updateMerchantModuleLink(int $merchantId, string $moduleId, array|MerchantModuleLink $merchantModuleLink): ?MerchantModuleLinkResponse
    {
        if ($merchantModuleLink instanceof MerchantModuleLink) {
            $merchantModuleLink = json_decode($this->serializer->serialize($merchantModuleLink, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('PUT', sprintf('merchant/%s/moduleLink/%s', $merchantId, $moduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($merchantModuleLink),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), MerchantModuleLinkResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $merchantModuleLink);
        }

        return null;
    }

    /**
     * Schedule. @see https://api.booxi.eu/doc/booking.html#/Schedule.
     */
    public function getMerchantSchedules(int $merchantId, array $options = []): ?ScheduleListResponse
    {
        $resolver = (new OptionsResolver())
            ->setDefined('rangeStart')->setAllowedTypes('rangeStart', ['string'])
            ->setDefined('rangeEnd')->setAllowedTypes('rangeEnd', ['string'])
            ->setDefined('cursor')->setAllowedTypes('cursor', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', sprintf('merchant/%s/schedule', $merchantId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ScheduleListResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function createMerchantSchedules(int $merchantId, Schedule|array $schedule): ?Schedule
    {
        if ($schedule instanceof Schedule) {
            $schedule = json_decode($this->serializer->serialize($schedule, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('POST', sprintf('merchant/%s/schedule', $merchantId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => $schedule,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Schedule::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $schedule);
        }

        return null;
    }

    public function getMerchantSchedule(int $merchantId, int $scheduleId): ?Schedule
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('merchant/%s/schedule/%s', $merchantId, $scheduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Schedule::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, []);
        }

        return null;
    }

    public function updateMerchantSchedule(int $merchantId, int $scheduleId, Schedule|array $schedule): ?Schedule
    {
        if ($schedule instanceof Schedule) {
            $schedule = json_decode($this->serializer->serialize($schedule, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('PUT', sprintf('merchant/%s/schedule/%s', $merchantId, $scheduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => $schedule,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Schedule::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $schedule);
        }

        return null;
    }

    public function deleteMerchantSchedule(int $merchantId, int $scheduleId): ?Schedule
    {
        try {
            $response = $this->httpClient->request('DELETE', sprintf('merchant/%s/schedule/%s', $merchantId, $scheduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Schedule::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function getStaffSchedules(int $staffId, array $options = []): ?ScheduleListResponse
    {
        $resolver = (new OptionsResolver())
            ->setDefined('rangeStart')->setAllowedTypes('rangeStart', ['string'])
            ->setDefined('rangeEnd')->setAllowedTypes('rangeEnd', ['string'])
            ->setDefined('cursor')->setAllowedTypes('cursor', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', sprintf('staff/%s/schedule', $staffId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ScheduleListResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function createStaffSchedules(int $staffId, Schedule|array $schedule): ?Schedule
    {
        if ($schedule instanceof Schedule) {
            $schedule = json_decode($this->serializer->serialize($schedule, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('POST', sprintf('staff/%s/schedule', $staffId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => $schedule,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Schedule::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $schedule);
        }

        return null;
    }

    public function getStaffSchedule(int $staffId, int $scheduleId): ?Schedule
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('staff/%s/schedule/%s', $staffId, $scheduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Schedule::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function updateStaffSchedule(int $staffId, int $scheduleId, Schedule|array $schedule): ?Schedule
    {
        if ($schedule instanceof Schedule) {
            $schedule = json_decode($this->serializer->serialize($schedule, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('PUT', sprintf('staff/%s/schedule/%s', $staffId, $scheduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => $schedule,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Schedule::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $schedule);
        }

        return null;
    }

    public function deleteStaffSchedule(int $staffId, int $scheduleId): ?Schedule
    {
        try {
            $response = $this->httpClient->request('DELETE', sprintf('staff/%s/schedule/%s', $staffId, $scheduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Schedule::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    /**
     * Service. @see https://api.booxi.eu/doc/booking.html#/Service.
     */
    public function getServices(array $options = []): ?ServiceListResponse
    {
        $resolver = (new OptionsResolver())
            ->setDefined('externalId')->setAllowedTypes('externalId', ['string'])
            ->setDefined('moduleId')->setAllowedTypes('moduleId', ['string'])
            ->setDefined('merchantId')->setAllowedTypes('merchantId', ['int'])
            ->setDefined('serviceCategoryId')->setAllowedTypes('serviceCategoryId', ['int'])
            ->setDefined('tags')->setAllowedTypes('tags', ['string'])
            ->setDefined('bookingMethod')->setAllowedValues('bookingMethod', BookingMethod::cases())
            ->setDefined('status')->setAllowedValues('status', BookingStatus::cases())
            ->setDefined('cursor')->setAllowedTypes('cursor', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'service/list', [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceListResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function createService(Service|array $service, array $options = []): ?Service
    {
        if ($service instanceof Service) {
            $service = json_decode($this->serializer->serialize($service, 'json'), true);
        }

        $resolver = (new OptionsResolver())
            ->setDefined('fromServiceId')->setAllowedTypes('fromServiceId', ['int'])
            ->setDefined('fromServiceTemplateId')->setAllowedTypes('fromServiceTemplateId', ['int'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('POST', 'service', [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
                'body' => json_encode($service),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Service::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $service);
        }

        return null;
    }

    public function getService(int $serviceId): ?Service
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('service/%s', $serviceId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Service::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function updateService(int $serviceId, array|Service $service): ?Service
    {
        if ($service instanceof Service) {
            $service = json_decode($this->serializer->serialize($service, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('PUT', sprintf('service/%s', $serviceId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($service),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Service::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $service);
        }

        return null;
    }

    public function deleteService(int $serviceId): ?Service
    {
        try {
            $response = $this->httpClient->request('DELETE', sprintf('service/%s', $serviceId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Service::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function uploadServiceImage(int $serviceId, string $fileContents): ?Service
    {
        try {
            $response = $this->httpClient->request('PUT', sprintf('service/%s/image', $serviceId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'multipart' => [
                    [
                        'name' => 'image',
                        'contents' => $fileContents,
                    ],
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Service::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function getServiceModuleLink(int $serviceId, string $moduleId): ?ServiceModuleLinkResponse
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('service/%s/moduleLink/%s', $serviceId, $moduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceModuleLinkResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function updateServiceModuleLink(int $serviceId, string $moduleId, array|ServiceModuleLink $serviceModuleLink): ?ServiceModuleLinkResponse
    {
        if ($serviceModuleLink instanceof ServiceModuleLink) {
            $serviceModuleLink = json_decode($this->serializer->serialize($serviceModuleLink, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('PUT', sprintf('service/%s/moduleLink/%s', $serviceId, $moduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($serviceModuleLink),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceModuleLinkResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $serviceModuleLink);
        }

        return null;
    }

    public function getServiceTranslations(int $serviceId): ?ServiceTranslations
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('service/%s/translations', $serviceId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceTranslations::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function updateServiceTranslations(int $serviceId, array|ServiceTranslations $serviceTranslations): ?ServiceTranslations
    {
        if ($serviceTranslations instanceof ServiceModuleLink) {
            $serviceTranslations = json_decode($this->serializer->serialize($serviceTranslations, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('PUT', sprintf('service/%s/translations', $serviceId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($serviceTranslations),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceTranslations::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $serviceTranslations);
        }

        return null;
    }

    /**
     * Service Category. @see https://api.booxi.eu/doc/booking.html#/Service%20Category.
     */
    public function getServiceCategories(array $options = []): ?ServiceCategoryListResponse
    {
        $resolver = (new OptionsResolver())
            ->setDefined('externalId')->setAllowedTypes('externalId', ['string'])
            ->setDefined('moduleId')->setAllowedTypes('moduleId', ['string'])
            ->setDefined('merchantId')->setAllowedTypes('merchantId', ['int'])
            ->setDefined('cursor')->setAllowedTypes('cursor', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'serviceCategory/list', [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceCategoryListResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function createServiceCategory(ServiceCategory|array $serviceCategory): ?ServiceCategory
    {
        if ($serviceCategory instanceof ServiceCategory) {
            $serviceCategory = json_decode($this->serializer->serialize($serviceCategory, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('POST', 'serviceCategory', [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($serviceCategory),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceCategory::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $serviceCategory);
        }

        return null;
    }

    public function getServiceCategory(int $serviceCategoryId): ?ServiceCategory
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('serviceCategory/%s', $serviceCategoryId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceCategory::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function updateServiceCategory(int $serviceCategoryId, array|ServiceCategory $serviceCategory): ?ServiceCategory
    {
        if ($serviceCategory instanceof ServiceCategory) {
            $serviceCategory = json_decode($this->serializer->serialize($serviceCategory, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('PUT', sprintf('serviceCategory/%s', $serviceCategoryId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($serviceCategory),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceCategory::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $serviceCategory);
        }

        return null;
    }

    public function deleteServiceCategory(int $serviceCategoryId): ?ServiceCategory
    {
        try {
            $response = $this->httpClient->request('DELETE', sprintf('serviceCategory/%s', $serviceCategoryId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceCategory::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function uploadServiceCategoryImage(int $serviceCategoryId, string $fileContents): ?ServiceCategory
    {
        try {
            $response = $this->httpClient->request('PUT', sprintf('serviceCategory/%s/image', $serviceCategoryId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'multipart' => [
                    [
                        'name' => 'image',
                        'contents' => $fileContents,
                    ],
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceCategory::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function getServiceCategoryModuleLink(int $serviceCategoryId, string $moduleId): ?ServiceCategoryModuleLinkResponse
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('serviceCategory/%s/moduleLink/%s', $serviceCategoryId, $moduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceCategoryModuleLinkResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function updateServiceCategoryModuleLink(int $serviceCategoryId, string $moduleId, array|ServiceCategoryModuleLink $serviceCategoryModuleLink): ?ServiceCategoryModuleLinkResponse
    {
        if ($serviceCategoryModuleLink instanceof ServiceCategoryModuleLink) {
            $serviceCategoryModuleLink = json_decode($this->serializer->serialize($serviceCategoryModuleLink, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('PUT', sprintf('serviceCategory/%s/moduleLink/%s', $serviceCategoryId, $moduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($serviceCategoryModuleLink),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceCategoryModuleLinkResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $serviceCategoryModuleLink);
        }

        return null;
    }

    public function getServiceCategoryTranslations(int $serviceCategoryId): ?ServiceCategoryTranslations
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('serviceCategory/%s/translations', $serviceCategoryId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceCategoryTranslations::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function updateServiceCategoryTranslations(int $serviceCategoryId, array|ServiceCategoryTranslations $serviceCategoryTranslations): ?ServiceCategoryTranslations
    {
        if ($serviceCategoryTranslations instanceof ServiceCategoryModuleLink) {
            $serviceCategoryTranslations = json_decode($this->serializer->serialize($serviceCategoryTranslations, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('PUT', sprintf('serviceCategory/%s/translations', $serviceCategoryId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($serviceCategoryTranslations),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), ServiceCategoryTranslations::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $serviceCategoryTranslations);
        }

        return null;
    }

    /**
     * Staff. @see https://api.booxi.eu/doc/booking.html#/Staff.
     */
    public function getStaffs(array $options = []): ?StaffListResponse
    {
        $resolver = (new OptionsResolver())
            ->setDefined('externalId')->setAllowedTypes('externalId', ['string'])
            ->setDefined('moduleId')->setAllowedTypes('moduleId', ['string'])
            ->setDefined('merchantId')->setAllowedTypes('merchantId', ['int'])
            ->setDefined('firstName')->setAllowedTypes('firstName', ['string'])
            ->setDefined('lastName')->setAllowedTypes('lastName', ['string'])
            ->setDefined('communicationEmail')->setAllowedTypes('communicationEmail', ['string'])
            ->setDefined('loginEmail')->setAllowedTypes('loginEmail', ['string'])
            ->setDefined('status')->setAllowedValues('status', OnlineStatus::cases())
            ->setDefined('personnelType')->setAllowedValues('personnelType', PersonnelType::cases())
            ->setDefined('cursor')->setAllowedTypes('cursor', ['string'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', 'staff/list', [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), StaffListResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function createStaff(int $merchantId, Staff|array $staff, array $options = []): ?Staff
    {
        if ($staff instanceof Staff) {
            $staff = json_decode($this->serializer->serialize($staff, 'json'), true);
        }

        $resolver = (new OptionsResolver())
            ->setDefined('fromStaffId')->setAllowedTypes('fromStaffId', ['int'])
            ->setDefined('fromStaffTemplateId')->setAllowedTypes('fromStaffTemplateId', ['int'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('POST', sprintf('staff/%s', $merchantId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
                'body' => json_encode($staff),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Staff::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $staff);
        }

        return null;
    }

    public function getStaff(int $staffId): ?Staff
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('staff/%s', $staffId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Staff::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function updateStaff(int $staffId, array|Staff $staff): ?Staff
    {
        if ($staff instanceof Staff) {
            $staff = json_decode($this->serializer->serialize($staff, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('PUT', sprintf('staff/%s', $staffId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($staff),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Staff::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $staff);
        }

        return null;
    }

    public function deleteStaff(int $staffId): ?Staff
    {
        try {
            $response = $this->httpClient->request('DELETE', sprintf('staff/%s', $staffId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Staff::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function getStaffModuleLink(int $staffId, string $moduleId): ?StaffModuleLinkResponse
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('staff/%s/moduleLink/%s', $staffId, $moduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), StaffModuleLinkResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function updateStaffModuleLink(int $staffId, string $moduleId, array|StaffModuleLink $staffModuleLink): ?StaffModuleLinkResponse
    {
        if ($staffModuleLink instanceof StaffModuleLink) {
            $staffModuleLink = json_decode($this->serializer->serialize($staffModuleLink, 'json'), true);
        }

        try {
            $response = $this->httpClient->request('PUT', sprintf('staff/%s/moduleLink/%s', $staffId, $moduleId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($staffModuleLink),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), StaffModuleLinkResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e, $staffModuleLink);
        }

        return null;
    }

    public function uploadStaffImage(int $staffId, string $fileContents): ?Staff
    {
        try {
            $response = $this->httpClient->request('PUT', sprintf('staff/%s/image', $staffId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'multipart' => [
                    [
                        'name' => 'image',
                        'contents' => $fileContents,
                    ],
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), Staff::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    /**
     * User Access. @see https://api.booxi.eu/doc/booking.html#/User%20Access.
     */
    public function getStaffPasswordRecovery(int $staffId, int $recoveryId): ?PasswordRecovery
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('staff/%s/passwordRecovery/%s', $staffId, $recoveryId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), PasswordRecovery::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function createStaffPasswordRecovery(int $staffId): ?PasswordRecovery
    {
        try {
            $response = $this->httpClient->request('POST', sprintf('staff/%s/passwordRecovery', $staffId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), PasswordRecovery::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function getStaffUserAccess(int $staffId): ?StaffUserAccessResponse
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('staff/%s/userAccess', $staffId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), StaffUserAccessResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    public function updateStaffUserAccess(int $staffId, StaffUserAccess|array $staffUserAccess, array $options = []): ?StaffUserAccessResponse
    {
        if ($staffUserAccess instanceof StaffUserAccess) {
            $staffUserAccess = json_decode($this->serializer->serialize($staffUserAccess, 'json'), true);
        }

        $resolver = (new OptionsResolver())
            ->setDefined('sendEmailInvite')->setAllowedTypes('sendEmailInvite', ['bool'])
        ;

        $resolvedOptions = $resolver->resolve($options);

        try {
            $response = $this->httpClient->request('GET', sprintf('staff/%s/userAccess', $staffId), [
                'headers' => [
                    'Booxi-PartnerKey' => $this->partnerKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => $resolvedOptions,
                'body' => json_encode($staffUserAccess),
            ]);

            return $this->serializer->deserialize((string) $response->getBody(), StaffUserAccessResponse::class, 'json');
        } catch (RequestException $e) {
            $this->logRequestException($e);
        }

        return null;
    }

    /**
     * Utils.
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
