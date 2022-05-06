## 1.7.1 - May 2022

- Added payout method `sbp`

## 1.7.0 - Match 2022

- Added new payment status `canceled`
- Added new notification type `cancel`

## 1.6.0 - February 2022

- Added splits for payments

## 1.5.19 - January 2022

- Add payment method `sbp`

## 1.5.18 - November 2021

- Allow empty account for Qiwi payments

## 1.5.17 - October 2021

- Fix process request for tokenized payments
- Add `error_details` to refund item

## 1.5.16 - August 2021

- Add `payer_percent` and `payer_percent_type` for payment create request

## 1.5.15 - July 2021

- Add `payer` and `extra` money for payment responses

## 1.5.14 - June 2021

- Add `usage_type` for card item

## 1.5.13 - April 2021

- Check new signature header

## 1.5.12 - February 2021

- Add `error_details` to subscription item

## 1.5.11 - December 2020

- Add body and headers to `JsonParseException`

## 1.5.10 - November 2020

- Add `auth_type` for card payments

## 1.5.9 - August 2020

- Extending api exception information (validation, original payment token for duplication recurrent and refund requests)
- Add `partner_payment_id` for refunds

## 1.5.8 - July 2020

- Add RRN information for payments and payouts.

## 1.5.7 - July 2020

- Extend webmoney purses support.

## 1.5.6 - July 2020

- Add `refund` object for notification request.
- Add `brand`  in card information.

## 1.5.5 - July 2020

- Add `partner_payment_id` for notification request.

## 1.5.4 - June 2020

- Bugfix: fix parsing json response.

## 1.5.3 - June 2020

- Add `is_payout_allowed` for fingerpint in card information.

## 1.5.2 - April 2020

- Internal refactoring for serialize objects

## 1.5.1 - March 2020

- Bugfix: ApplePay object serialization

## 1.5.0 - March 2020

- Add support for tokenized payments (Apple Pay, Google Pay)

## 1.4.5 - March 2020

- Add `hide_form_tokenized_methods` parameter in payment settings 
- Added support for error details for payments and notifications

## 1.4.4 - January 2020

- Bugfix: add `capture` in `CreatePaymentSerializer` (thanks @Dezinger)

## 1.4.3 - December 2019

- Add `capture` in `CreatePaymentRequest`

## 1.4.2 - December 2019

- Bugfix: `partner_payment_id` is string string
- Add `refunds` in payment response

## 1.4.1 - November 2019

- Add `purse_type` for webmoney payments (`R` and `P` wallets)

## 1.4.0 - September 2019

- Add payout method `card_fingerprint` (thanks @kalyabin)
- Add `back_url` parameter in payment settings (thanks @kalyabin)
- Add card info for payments and payouts responses (thanks @kalyabin)
- Add status description in `ProcessPaymentResponse`

## 1.3.1 - August 2019

- Add internal method `patch`

## 1.3.0 - July 2019

- Add fields `description` and `custom_parameters` for payouts
- [BC] Fix rates for cashboxes (vat18 -> vat20, vat118 -> vat120) (thanks @burnb)

## 1.2.0 - February 2019

- Add methods for refund
- Add subscriptions support
- Add `partner_payment_id` in payments
- Add `error_details` in payouts
- Fix bugs 

## 1.1.0 - December 2018

- Add method `wallet/get`
- Add key `hide_form_header` for method `payment/create`
- Add key `hide_form_methods` for method `payment/create`
- Fix key `is_test` for method `payment/create`
- Fix test

## 1.0.0 - June 2018

- No changes
