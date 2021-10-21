<form action="https://pay.sandbox.realexpayments.com/pay" method="POST" target="iframe">
  <input type="hidden" name="TIMESTAMP" value="20180613110737">
  <input type="hidden" name="MERCHANT_ID" value="MerchantId">
  <input type="hidden" name="ACCOUNT" value="internet">
  <input type="hidden" name="ORDER_ID" value="N6qsk4kYRZihmPrTXWYS6g">
  <input type="hidden" name="AMOUNT" value="1999">
  <input type="hidden" name="CURRENCY" value="EUR">
  <input type="hidden" name="AUTO_SETTLE_FLAG" value="1">
  <input type="hidden" name="COMMENT1" value="Mobile Channel">
  <input type="hidden" name="HPP_VERSION" value="2">
  <input type="hidden" name="HPP_CHANNEL" value="ECOM">
  <input type="hidden" name="HPP_LANG" value="en">
  <!-- Begin 3D Secure 2 Mandatory and Recommended Fields -->
  <input type="hidden" name="HPP_CUSTOMER_EMAIL" value="test@example.com">
  <input type="hidden" name="HPP_CUSTOMER_PHONENUMBER_MOBILE" value="44|789456123">
  <input type="hidden" name="HPP_BILLING_STREET1" value="Flat 123">
  <input type="hidden" name="HPP_BILLING_STREET2" value="House 456">
  <input type="hidden" name="HPP_BILLING_STREET3" value="Unit 4">
  <input type="hidden" name="HPP_BILLING_CITY" value="Halifax">
  <input type="hidden" name="HPP_BILLING_POSTALCODE" value="W5 9HR">
  <input type="hidden" name="HPP_BILLING_COUNTRY" value="826">
  <input type="hidden" name="HPP_SHIPPING_STREET1" value="Apartment 852">
  <input type="hidden" name="HPP_SHIPPING_STREET2" value="Complex 741">
  <input type="hidden" name="HPP_SHIPPING_STREET3" value="House 963">
  <input type="hidden" name="HPP_SHIPPING_CITY" value="Chicago">
  <input type="hidden" name="HPP_SHIPPING_STATE" value="IL">
  <input type="hidden" name="HPP_SHIPPING_POSTALCODE" value="50001">
  <input type="hidden" name="HPP_SHIPPING_COUNTRY" value="840">
  <input type="hidden" name="HPP_ADDRESS_MATCH_INDICATOR" value="FALSE">
  <input type="hidden" name="HPP_CHALLENGE_REQUEST_INDICATOR" value="NO_PREFERENCE">
  <!-- End 3D Secure 2 Mandatory and Recommended Fields -->
  <!-- Begin Fraud Management and Reconciliation Fields -->
  <input type="hidden" name="BILLING_CODE" value="59|123">
  <input type="hidden" name="BILLING_CO" value="GB">
  <input type="hidden" name="SHIPPING_CODE" value="50001|Apartment 852">
  <input type="hidden" name="SHIPPING_CO" value="US">
  <input type="hidden" name="CUST_NUM" value="6e027928-c477-4689-a45f-4e138a1f208a">
  <input type="hidden" name="VAR_REF" value="Acme Corporation">
  <input type="hidden" name="PROD_ID" value="SKU1000054">
  <!-- End Fraud Management and Reconciliation Fields -->
  <input type="hidden" name="MERCHANT_RESPONSE_URL" value="https://www.example.com/responseUrl">
  <input type="hidden" name="CARD_PAYMENT_BUTTON" value="Pay Invoice">
  <input type="hidden" name="CUSTOM_FIELD_NAME" value="Custom Field Data">
  <input type="hidden" name="SHA1HASH" value="308bb8dfbbfcc67c28d602d988ab104c3b08d012">
  <input type="submit" value="Click To Pay">
</form>