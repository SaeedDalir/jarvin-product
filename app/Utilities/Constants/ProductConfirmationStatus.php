<?php namespace App\Utilities\Constants;

class ProductConfirmationStatus
{
    public const PRE_CONFIRMATION = 0;
    public const CONFIRMED = 1;
    public const NOT_CONFIRMED = 2;

    public const EXISTS = 1;
    public const NOT_EXISTS = 0;

    public const PRE_PURCHASE = 0;
    public const AVAILABLE = 1;
    public const UNAVAILABLE = 2;
    public const PURCHASED = 3;

    public static function confirmationStatus($status): ?string
    {
        switch ($status) {
            case self::CONFIRMED:
                return 'تایید شده';
            case self::NOT_CONFIRMED:
                return 'تایید نشده';
            case self::PRE_CONFIRMATION:
            default:
                return 'در انتظار تایید';
        }
    }
}
