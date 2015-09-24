<?php

$decode = json_decode('
{
    "customer": {
      "ipAddress": "172.20.18.80"
    },
    "gatewayEntryPoint": "AUTO",
    "merchant": "TEST9353186357",
    "order": {
      "amount": 1999.02,
      "currency": "MXN",
      "id": "9608388",
      "reference": "Orden # 9608388",
      "status": "CAPTURED",
      "totalAuthorizedAmount": 1999.02,
      "totalCapturedAmount": 1999.02,
      "totalRefundedAmount": 0
    },
    "paymentPlan": {
      "numberOfPayments": 6,
      "type": "AMEX_PLANN"
    },
    "response": {
      "acquirerCode": "000",
      "acquirerMessage": "Successful request",
      "cardSecurityCode": {
        "acquirerCode": "Y",
        "gatewayCode": "MATCH"
      },
      "gatewayCode": "APPROVED",
      "risk": {
        "gatewayCode": "NOT_CHECKED",
        "review": {
          "decision": "NOT_REQUIRED"
        }
      }
    },
    "result": "SUCCESS",
    "sourceOfFunds": {
      "provided": {
        "card": {
          "expiry": {
            "month": "5",
            "year": "17"
          },
          "number": "345678xxxxx4564",
          "scheme": "AMEX"
        }
      },
      "type": "CARD"
    },
    "timeOfRecord": "2015-07-08T22:09:27.361Z",
    "transaction": {
      "acquirer": {
        "batch": 2,
        "id": "AMEXLAC",
        "merchantId": "9353186357"
      },
      "amount": 1999.02,
      "authorizationCode": "111128",
      "currency": "MXN",
      "frequency": "SINGLE",
      "id": "1507713",
      "receipt": "15070820",
      "reference": "Pago # 1507713",
      "source": "INTERNET",
      "terminal": "00001",
      "type": "CAPTURE"
    },
    "version": "13"
}', true);

$log = '';
$callback = function ($value, $key) use (&$log) {
    $log .= $key.": ".$value."<br>";
};

array_walk_recursive($decode, $callback);

echo $log;

#echo "<pre>";print_r(array_merge($decode, $array));echo "</pre>";