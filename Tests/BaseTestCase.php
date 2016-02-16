<?php
namespace Paystack\Tests;

/**
 * Description of BaseTestCase
 *
 * @author Doctormaliko
 */
class BaseTestCase extends \PHPUnit_Framework_TestCase {
    //put your code here
    protected $customerResource;
    protected $customer;

    protected $planResource;
    protected $plan;

    protected $transactionRequestArray;

    protected $customerCreateResponseData = [
        "first_name"=> "first_name",
        "last_name"=> "last_name",
        "email"=> "email@email.com",
        "phone"=> "2348032145698",
        "integration"=> 100082,
        "domain"=> "test",
        "customer_code"=> "CUS_docpswclqcq6oha",
        "id"=> 4158,
        "createdAt"=> "2016-02-14T10:15:33.481Z",
        "updatedAt"=> "2016-02-14T10:15:33.481Z"
    ];

    protected $customerRetrievedResponseData = [
        "transactions"=> [],
        "subscriptions"=> [],
        "authorizations"=> [],
        "first_name"=> "first_name",
        "last_name"=> "last_name",
        "email"=> "email@email.com",
        "phone"=> "2348032145698",
        "metadata"=> null,
        "domain"=> "test",
        "customer_code"=> "CUS_k324c8osdjcohgt",
        "id"=> 4166,
        "integration"=> 100082,
        "createdAt"=> "2016-02-14T10:56:55.000Z",
        "updatedAt"=> "2016-02-14T10:56:55.000Z",
        "total_transactions"=> 0,
        "total_transaction_value"=> 0
    ];

    protected $customerUpdatedResponseData = [
        "first_name"=> "first_name",
        "last_name"=> "new_last_name",
        "email"=> "email@email.com",
        "phone"=> "2348032145698",
        "metadata"=> null,
        "domain"=> "test",
        "customer_code"=> "CUS_k324c8osdjcohgt",
        "id"=> 4166,
        "integration"=> 100082,
        "createdAt"=> "2016-02-14T10:56:55.000Z",
        "updatedAt"=> "2016-02-14T19:22:41.000Z"
    ];

    protected $customerData = [
        'first_name' => 'first_name',
        'last_name' => 'last_name',
        'email' => 'email@email.com',
        'phone' => '2348032145698'
    ];

    protected $planCreatedResourceResponseData = [
        "name"=> "new_test_plan",
        "description"=> "New Test Plan",
        "amount"=> 10000,
        "currency"=> "NGN",
        "integration"=> 100082,
        "domain"=> "test",
        "plan_code"=> "PLN_qxcu4d3ws1its7n",
        "interval"=> "monthly",
        "send_invoices"=> true,
        "send_sms"=> true,
        "hosted_page"=> false,
        "id"=> 65,
        "createdAt"=> "2016-02-15T13:13:32.055Z",
        "updatedAt"=> "2016-02-15T13:13:32.055Z"
    ];

    protected $planRetrievedResourceResponseData = [
        "subscriptions"=> [],
        "integration"=> 100082,
        "domain"=> "test",
        "name"=> "new_test_plan",
        "plan_code"=> "PLN_qxcu4d3ws1its7n",
        "description"=> "New Test Plan",
        "amount"=> 10000,
        "interval"=> "monthly",
        "send_invoices"=> true,
        "send_sms"=> true,
        "hosted_page"=> false,
        "hosted_page_url"=> null,
        "hosted_page_summary"=> null,
        "currency"=> "NGN",
        "id"=> 65,
        "createdAt"=> "2016-02-15T13:13:32.000Z",
        "updatedAt"=> "2016-02-15T13:13:32.000Z"
    ];

    protected $planUpdatedResourceResponseData = [
        "domain"=> "test",
        "name"=> "new_test_plan",
        "plan_code"=> "PLN_qxcu4d3ws1its7n",
        "description"=> "new plan description",
        "amount"=> 10000,
        "interval"=> "monthly",
        "send_invoices"=> true,
        "send_sms"=> true,
        "hosted_page"=> false,
        "hosted_page_url"=> null,
        "hosted_page_summary"=> null,
        "currency"=> "NGN",
        "id"=> 65,
        "integration"=> 100082,
        "createdAt"=> "2016-02-15T13:13:32.000Z",
        "updatedAt"=> "2016-02-15T13:15:30.000Z"
    ];

    protected $planData = [
        'name' => 'new_test_plan',
        'description' => 'New Test Plan',
        'amount' => 10000,
        'currency' => 'NGN'
    ];

    protected $initOneTimeTransactionResourceResponseData = [
        "authorization_url"=> "https=>//standard.paystack.co/pay/u0w3i084gp",
        "access_code"=> "u0w3i084gp",
        "reference"=> "radnosm160202014046"
    ];

    protected $chargeReturningTransactionResourceResponseData = [
        "amount"=> 10000,
        "transaction_date"=> "2016-02-02T02:41:25.000Z",
        "status"=> "success",
        "reference"=> "radnosm160202014046",
        "domain"=> "test",
        "authorization"=> [
            "authorization_code"=> "AUTH_jonwwppn",
            "card_type"=> "visa",
            "last4"=> "1381",
            "bank"=> null
        ],
        "customer"=> [
            "first_name"=> null,
            "last_name"=> null,
            "email"=> "testuser@test.com"
        ],
        "plan"=> 0
    ];

    protected $transactionDetailsResponseData = [
        "integration"=> 100082,
        "customer"=> [
            "first_name"=> "first_name",
            "last_name"=> "last_name",
            "email"=> "email@email.com",
            "phone"=> "2348032145698",
            "metadata"=> null,
            "domain"=> "test",
            "customer_code"=> "CUS_docpswclqcq6oha",
            "id"=> 4158,
            "integration"=> 100082,
            "createdAt"=> "2016-02-14T10:15:33.000Z",
            "updatedAt"=> "2016-02-14T10:15:33.000Z"
        ],
        "coupon"=> 0,
        "plan"=> 0,
        "subscription"=> null,
        "invoice"=> null,
        "reference"=> "imaginary_reference_key",
        "domain"=> "test",
        "status"=> "pending",
        "message"=> null,
        "original_amount"=> 10000,
        "amount"=> 10000,
        "authorized_amount"=> null,
        "captured_amount"=> null,
        "quantity"=> 1,
        "gateway_response"=> null,
        "receipt_number"=> null,
        "merchant_transaction_reference"=> null,
        "authorization_code"=> null,
        "authorization_url"=> "u0w3i084gp",
        "authorization_url_valid"=> true,
        "authorization_url_accessed_at"=> null,
        "authorization_url_access_count"=> null,
        "currency"=> "NGN",
        "logged_for_settlement"=> null,
        "settled"=> null,
        "metadata"=> null,
        "response"=> null,
        "transaction_number"=> null,
        "payment_page"=> null,
        "ip_address"=> null,
        "paidAt"=> null,
        "id"=> 9663,
        "createdAt"=> "2016-02-15T17:49:21.000Z",
        "updatedAt"=> null
    ];

    protected $allTransactionsResponseData = [
        [
            "integration" => 100082,
            "customer" => [
                "first_name" => "first_name",
                "last_name" => "last_name",
                "email" => "email@email.com",
                "phone" => "2348032145698",
                "metadata" => null,
                "domain" => "test",
                "customer_code" => "CUS_docpswclqcq6oha",
                "id" => 4158,
                "integration" => 100082,
                "createdAt" => "2016-02-14T10:15:33.000Z",
                "updatedAt" => "2016-02-14T10:15:33.000Z"
            ],
            "coupon" => 0,
            "plan" => 0,
            "subscription" => null,
            "invoice" => null,
            "reference" => "imaginary_reference_key",
            "domain" => "test",
            "status" => "pending",
            "message" => null,
            "original_amount" => 10000,
            "amount" => 10000,
            "authorized_amount" => null,
            "captured_amount" => null,
            "quantity" => 1,
            "gateway_response" => null,
            "receipt_number" => null,
            "merchant_transaction_reference" => null,
            "authorization_code" => null,
            "authorization_url" => "u0w3i084gp",
            "authorization_url_valid" => true,
            "authorization_url_accessed_at" => null,
            "authorization_url_access_count" => null,
            "currency" => "NGN",
            "logged_for_settlement" => null,
            "settled" => null,
            "metadata" => null,
            "response" => null,
            "transaction_number" => null,
            "payment_page" => null,
            "ip_address" => null,
            "paidAt" => null,
            "id" => 9663,
            "createdAt" => "2016-02-15T17:49:21.000Z",
            "updatedAt" => null
        ],
        [
            "integration" => 100082,
            "customer" => [
                "first_name" => null,
                "last_name" => null,
                "email" => "testuser@test.com",
                "phone" => null,
                "metadata" => null,
                "domain" => "test",
                "customer_code" => "CUS_ob42yn9tskrdg7x",
                "id" => 2855,
                "integration" => 100082,
                "createdAt" => "2016-02-02T01:36:16.000Z",
                "updatedAt" => "2016-02-02T01:36:16.000Z"
            ],
            "coupon" => 0,
            "plan" => 0,
            "subscription" => null,
            "invoice" => null,
            "authorization" => [
                "domain" => "test",
                "authorization_code" => "AUTH_jonwwppn",
                "card_type" => null,
                "last4" => null,
                "bank" => null,
                "description" => "visa ending with 1381",
                "mobile" => null,
                "id" => 2381,
                "integration" => 100082,
                "customer" => 2855,
                "card" => 5513,
                "createdAt" => "2016-02-07T15:07:21.000Z",
                "updatedAt" => null
            ],
            "reference" => "radnosm160202014046",
            "domain" => "test",
            "status" => "success",
            "message" => null,
            "original_amount" => 5000,
            "amount" => 5000,
            "authorized_amount" => 5000,
            "captured_amount" => 5000,
            "quantity" => 1,
            "gateway_response" => "Success",
            "receipt_number" => "517301335067",
            "merchant_transaction_reference" => "PSTKg285q",
            "authorization_code" => "AUTH_jonwwppn",
            "authorization_url" => "9h4fd7ksim",
            "authorization_url_valid" => false,
            "authorization_url_accessed_at" => null,
            "authorization_url_access_count" => null,
            "currency" => "NGN",
            "logged_for_settlement" => "ignored",
            "settled" => null,
            "metadata" => null,
            "response" => "vpc_AVSResultCode=Unsupported&vpc_AcqAVSRespCode=Unsupported&vpc_AcqCSCRespCode=M&vpc_AcqResponseCode=00&vpc_Amount=5000&vpc_AuthorizeId=testtest&vpc_BatchNo=20150621&vpc_CSCResultCode=M&vpc_Card=MC&vpc_Command=pay&vpc_Currency=NGN&vpc_Locale=en_NG&vpc_MerchTxnRef=PSTKg285q&vpc_Merchant=PWC001&vpc_Message=Approved&vpc_OrderInfo=PSTKz4ogk&vpc_ReceiptNo=517301335067&vpc_SecureHash=234D2610F6A533A0A83F09137DE54FABC1A3C1FD8D7C372A814152AF4B877A06&vpc_SecureHashType=SHA256&vpc_TransactionNo=1100000876&vpc_TxnResponseCode=0&vpc_Version=1",
            "transaction_number" => "1100000876",
            "payment_page" => null,
            "ip_address" => null,
            "paidAt" => "2016-02-07T15:07:21.000Z",
            "id" => 5561,
            "createdAt" => "2016-02-02T02:41:25.000Z",
            "updatedAt" => "2016-02-07T15:07:25.000Z"
        ],
        [
            "integration" => 100082,
            "customer" => [
                "first_name" => null,
                "last_name" => null,
                "email" => "testuser@test.com",
                "phone" => null,
                "metadata" => null,
                "domain" => "test",
                "customer_code" => "CUS_ob42yn9tskrdg7x",
                "id" => 2855,
                "integration" => 100082,
                "createdAt" => "2016-02-02T01:36:16.000Z",
                "updatedAt" => "2016-02-02T01:36:16.000Z"
            ],
            "coupon" => 0,
            "plan" => 0,
            "subscription" => null,
            "invoice" => null,
            "reference" => "radnosm160202013743",
            "domain" => "test",
            "status" => "pending",
            "message" => null,
            "original_amount" => 5000,
            "amount" => 5000,
            "authorized_amount" => null,
            "captured_amount" => null,
            "quantity" => 1,
            "gateway_response" => null,
            "receipt_number" => null,
            "merchant_transaction_reference" => null,
            "authorization_code" => null,
            "authorization_url" => "r3it6og93x",
            "authorization_url_valid" => true,
            "authorization_url_accessed_at" => null,
            "authorization_url_access_count" => null,
            "currency" => "NGN",
            "logged_for_settlement" => null,
            "settled" => null,
            "metadata" => null,
            "response" => null,
            "transaction_number" => null,
            "payment_page" => null,
            "ip_address" => null,
            "paidAt" => null,
            "id" => 5560,
            "createdAt" => "2016-02-02T02:38:22.000Z",
            "updatedAt" => null
        ],
        [
            "integration" => 100082,
            "customer" => [
                "first_name" => null,
                "last_name" => null,
                "email" => "testuser@test.com",
                "phone" => null,
                "metadata" => null,
                "domain" => "test",
                "customer_code" => "CUS_ob42yn9tskrdg7x",
                "id" => 2855,
                "integration" => 100082,
                "createdAt" => "2016-02-02T01:36:16.000Z",
                "updatedAt" => "2016-02-02T01:36:16.000Z"
            ],
            "coupon" => 0,
            "plan" => 0,
            "subscription" => null,
            "invoice" => null,
            "reference" => "radnosm160202013616",
            "domain" => "test",
            "status" => "pending",
            "message" => null,
            "original_amount" => 5000,
            "amount" => 5000,
            "authorized_amount" => null,
            "captured_amount" => null,
            "quantity" => 1,
            "gateway_response" => null,
            "receipt_number" => null,
            "merchant_transaction_reference" => null,
            "authorization_code" => null,
            "authorization_url" => "pvowir7xns",
            "authorization_url_valid" => true,
            "authorization_url_accessed_at" => null,
            "authorization_url_access_count" => null,
            "currency" => "NGN",
            "logged_for_settlement" => null,
            "settled" => null,
            "metadata" => null,
            "response" => null,
            "transaction_number" => null,
            "payment_page" => null,
            "ip_address" => null,
            "paidAt" => null,
            "id" => 5559,
            "createdAt" => "2016-02-02T02:36:55.000Z",
            "updatedAt" => null
        ]
    ];

    protected $transactionTotalsResponseData = [
        "total_volume" => 5000,
        "total_transactions" => 1,
        "pending_transfers" => 5000
    ];

    protected $verifyTransactionResponseData = [
        "amount" => 5000,
        "transaction_date" => "2016-02-02T02:41:25.000Z",
        "status" => "success",
        "reference" => "radnosm160202014046",
        "domain" => "test",
        "authorization" => [
            "authorization_code" => "AUTH_jonwwppn",
            "card_type" => "visa",
            "last4" => "1381",
            "bank" => null
        ],
        "customer" => [
            "first_name" => null,
            "last_name" => null,
            "email" => "testuser@test.com"
        ],
        "plan" => 0
    ];

    public function setUp()
    {
        parent::setUp();

    }

    public function tearDown()
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }
}
