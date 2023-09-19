<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();
        $url = 'https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-Lampung.xml';

        try {
            $response = $client->request('GET', $url);
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();

            // Jika respons kode status 200 (OK)
            if ($statusCode == 200) {
                $xml = simplexml_load_string($body);

                // Kode di bawah ini hanya sebagai contoh
                // Mengambil beberapa informasi dari XML
                foreach ($xml->forecast->area as $area) {
                    echo "Area: " . $area['id'] . ", " . $area['description'] . "\n";

                    foreach ($area->parameter as $parameter) {
                        echo "Parameter: " . $parameter['description'] . "\n";
                        foreach ($parameter->timerange as $timeRange) {
                            echo "Waktu: " . $timeRange['datetime'] . "\n";
                            echo "Nilai: " . $timeRange->value . "\n";
                        }
                    }
                    echo "-------\n";
                }
            }

        } catch (Exception $e) {
            // Penanganan error
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function fetchWeatherHighData(Request $request)
    {
        $client = new Client();
        $url = 'https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-Lampung.xml';

        try {
            $response = $client->request('GET', $url);
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();

            // Jika respons kode status 200 (OK)
            if ($statusCode == 200) {
                $xml = simplexml_load_string($body);
                $highTemperatureAreas = [];
                // Kode di bawah ini hanya sebagai contoh
                // Mengambil beberapa informasi dari XML
                foreach ($xml->forecast->area as $area) {
                    foreach ($area->parameter as $parameter) {
                        if ((string) $parameter['description'] === 'Temperature') {
                            foreach ($parameter->timerange as $timeRange) {
                                $temperature = (int) $timeRange->value;

                                if ($temperature > 30) {
                                    $highTemperatureAreas[] = [
                                        'area' => (string) $area['description'],
                                        'datetime' => (string) $timeRange['datetime'],
                                        'temperature' => $temperature
                                    ];
                                }
                            }
                        }
                    }
                }
                return response()->json(['high_temperature_areas' => $highTemperatureAreas]);
            }

        } catch (Exception $e) {
            // Penanganan error
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function fetchWeatherLowData(Request $request)
    {
        $client = new Client();
        $url = 'https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-Lampung.xml';

        try {
            $response = $client->request('GET', $url);
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();

            // Jika respons kode status 200 (OK)
            if ($statusCode == 200) {
                $xml = simplexml_load_string($body);
                $highTemperatureAreas = [];
                // Kode di bawah ini hanya sebagai contoh
                // Mengambil beberapa informasi dari XML
                foreach ($xml->forecast->area as $area) {
                    foreach ($area->parameter as $parameter) {
                        if ((string) $parameter['description'] === 'Temperature') {
                            foreach ($parameter->timerange as $timeRange) {
                                $temperature = (int) $timeRange->value;

                                if ($temperature < 30) {
                                    $highTemperatureAreas[] = [
                                        'area' => (string) $area['description'],
                                        'datetime' => (string) $timeRange['datetime'],
                                        'temperature' => $temperature
                                    ];
                                }
                            }
                        }
                    }
                }
                return response()->json(['high_temperature_areas' => $highTemperatureAreas]);
            }

        } catch (Exception $e) {
            // Penanganan error
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function fetchWeatherNormalData(Request $request)
    {
        $client = new Client();
        $url = 'https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-Lampung.xml';

        try {
            $response = $client->request('GET', $url);
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();

            // Jika respons kode status 200 (OK)
            if ($statusCode == 200) {
                $xml = simplexml_load_string($body);
                $highTemperatureAreas = [];
                // Kode di bawah ini hanya sebagai contoh
                // Mengambil beberapa informasi dari XML
                foreach ($xml->forecast->area as $area) {
                    foreach ($area->parameter as $parameter) {
                        if ((string) $parameter['description'] === 'Temperature') {
                            foreach ($parameter->timerange as $timeRange) {
                                $temperature = (int) $timeRange->value;

                                if ($temperature == 30) {
                                    $highTemperatureAreas[] = [
                                        'area' => (string) $area['description'],
                                        'datetime' => (string) $timeRange['datetime'],
                                        'temperature' => $temperature
                                    ];
                                }
                            }
                        }
                    }
                }
                return response()->json(['high_temperature_areas' => $highTemperatureAreas]);
            }

        } catch (Exception $e) {
            // Penanganan error
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
