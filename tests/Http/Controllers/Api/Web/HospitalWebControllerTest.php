<?php


namespace Tests\Http\Controllers\Api\Web;

use App\Http\Controllers\Api\Web\PatientWebController;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class HospitalWebControllerTest extends TestCase
{

    public function testDataTable()
    {
        $client = new Client();

        try {
            $response = $client->request('GET', 'http://localhost:8000/api/web/v1/hospital/datatable', [
                'query' => [
                    'draw' => 1,
                    'columns' => [
                        ['data' => 'id', 'name' => 'id', 'searchable' => 'true', 'orderable' => 'true', 'search' => ['value' => '', 'regex' => 'false']],
                        ['data' => 'hospitalName', 'name' => 'hospitalName', 'searchable' => 'true', 'orderable' => 'true', 'search' => ['value' => '', 'regex' => 'false']],
                        ['data' => 'address', 'name' => 'address', 'searchable' => 'true', 'orderable' => 'true', 'search' => ['value' => '', 'regex' => 'false']],
                        ['data' => 'email', 'name' => 'email', 'searchable' => 'true', 'orderable' => 'true', 'search' => ['value' => '', 'regex' => 'false']],
                        ['data' => 'phone', 'name' => 'phone', 'searchable' => 'true', 'orderable' => 'true', 'search' => ['value' => '', 'regex' => 'false']],
                        ['data' => 'createdAtHuman', 'name' => 'createdAt', 'searchable' => 'true', 'orderable' => 'true', 'search' => ['value' => '', 'regex' => 'false']],
                        ['data' => 'updatedAtHuman', 'name' => 'updatedAt', 'searchable' => 'true', 'orderable' => 'true', 'search' => ['value' => '', 'regex' => 'false']],
                        ['data' => 'action', 'name' => 'action', 'searchable' => 'false', 'orderable' => 'false', 'search' => ['value' => '', 'regex' => 'false']],
                    ],
                    'order' => [
                        ['column' => 0, 'dir' => 'asc'],
                    ],
                    'start' => 0,
                    'length' => 5,
                    'search' => ['value' => '', 'regex' => 'false'],
                    '_' => time(),
                ]
            ]);

            Assert::assertTrue($response->getStatusCode() == 200);
        } catch (RequestException $e) {
            echo "❌ Request failed: " . $e->getMessage() . "\n";
        }

    }
}
