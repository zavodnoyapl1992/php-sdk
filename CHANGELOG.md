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