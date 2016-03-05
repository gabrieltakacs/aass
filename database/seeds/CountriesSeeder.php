<?php

use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [[
            'name' => 'Alabama',
            'abbr' => 'AL',
            'capital' => 'Montgomery'
        ], [
            'name' => 'Alaska',
            'abbr' => 'AK',
            'capital' => 'Juneau'
        ], [
            'name' => 'Arizona',
            'abbr' => 'AZ',
            'capital' => 'Phoenix'
        ], [
            'name' => 'Arkansas',
            'abbr' => 'AR',
            'capital' => 'Little Rock'
        ], [
            'name' => 'California',
            'abbr' => 'CA',
            'capital' => 'Sacramento'
        ], [
            'name' => 'Colorado',
            'abbr' => 'CO',
            'capital' => 'Denver'
        ], [
            'name' => 'Connecticut',
            'abbr' => 'CT',
            'capital' => 'Hartford'
        ], [
            'name' => 'Delaware',
            'abbr' => 'DE',
            'capital' => 'Dover'
        ], [
            'name' => 'Florida',
            'abbr' => 'FL',
            'capital' => 'Tallahassee'
        ], [
            'name' => 'Georgia',
            'abbr' => 'GA',
            'capital' => 'Atlanta'
        ], [
            'name' => 'Hawaii',
            'abbr' => 'HI',
            'capital' => 'Honolulu'
        ], [
            'name' => 'Idaho',
            'abbr' => 'ID',
            'capital' => 'Boise'
        ], [
            'name' => 'Illinois',
            'abbr' => 'IL',
            'capital' => 'Springfield'
        ], [
            'name' => 'Indiana',
            'abbr' => 'IN',
            'capital' => 'Indianapolis'
        ], [
            'name' => 'Iowa',
            'abbr' => 'IA',
            'capital' => 'Des Moines'
        ], [
            'name' => 'Kansas',
            'abbr' => 'KS',
            'capital' => 'Topeka'
        ], [
            'name' => 'Kentucky',
            'abbr' => 'KY',
            'capital' => 'Frankfort'
        ], [
            'name' => 'Louisiana',
            'abbr' => 'LA',
            'capital' => 'Baton Rouge'
        ], [
            'name' => 'Maine',
            'abbr' => 'ME',
            'capital' => 'Augusta'
        ], [
            'name' => 'Maryland',
            'abbr' => 'MD',
            'capital' => 'Annapolis'
        ], [
            'name' => 'Massachusetts',
            'abbr' => 'MA',
            'capital' => 'Boston'
        ], [
            'name' => 'Michigan',
            'abbr' => 'MI',
            'capital' => 'Lansing'
        ], [
            'name' => 'Minnesota',
            'abbr' => 'MN',
            'capital' => 'St. Paul'
        ], [
            'name' => 'Mississippi',
            'abbr' => 'MS',
            'capital' => 'Jackson'
        ], [
            'name' => 'Missouri',
            'abbr' => 'MO',
            'capital' => 'Jefferson City'
        ], [
            'name' => 'Montana',
            'abbr' => 'MT',
            'capital' => 'Helena'
        ], [
            'name' => 'Nebraska',
            'abbr' => 'NE',
            'capital' => 'Lincoln'
        ], [
            'name' => 'Nevada',
            'abbr' => 'NV',
            'capital' => 'Carson City'
        ], [
            'name' => 'New Hampshire',
            'abbr' => 'NH',
            'capital' => 'Concord'
        ], [
            'name' => 'New Jersey',
            'abbr' => 'NJ',
            'capital' => 'Trenton'
        ], [
            'name' => 'New Mexico',
            'abbr' => 'NM',
            'capital' => 'Santa Fe'
        ], [
            'name' => 'New York',
            'abbr' => 'NY',
            'capital' => 'Albany'
        ], [
            'name' => 'North Carolina',
            'abbr' => 'NC',
            'capital' => 'Raleigh'
        ],  [
            'name' => 'North Dakota',
            'abbr' => 'ND',
            'capital' => 'Bismarck'
        ], [
            'name' => 'Ohio',
            'abbr' => 'OH',
            'capital' => 'Columbus'
        ], [
            'name' => 'Oklahoma',
            'abbr' => 'OK',
            'capital' => 'Oklahoma City'
        ], [
            'name' => 'Oregon',
            'abbr' => 'OR',
            'capital' => 'Salem'
        ], [
            'name' => 'Pennsylvania',
            'abbr' => 'PA',
            'capital' => 'Harrisburg'
        ], [
            'name' => 'Rhode Island',
            'abbr' => 'RI',
            'capital' => 'Providence'
        ], [
            'name' => 'South Carolina',
            'abbr' => 'SC',
            'capital' => 'Columbia'
        ], [
            'name' => 'South Dakota',
            'abbr' => 'SD',
            'capital' => 'Pierre'
        ], [
            'name' => 'Tennessee',
            'abbr' => 'TN',
            'capital' => 'Nashville'
        ], [
            'name' => 'Texas',
            'abbr' => 'TX',
            'capital' => 'Austin'
        ], [
            'name' => 'Utah',
            'abbr' => 'UT',
            'capital' => 'Salt Lake City'
        ], [
            'name' => 'Vermont',
            'abbr' => 'VT',
            'capital' => 'Montpelier'
        ], [
            'name' => 'Virginia',
            'abbr' => 'VA',
            'capital' => 'Richmond'
        ], [
            'name' => 'Washington',
            'abbr' => 'WA',
            'capital' => 'Olympia'
        ], [
            'name' => 'West Virginia',
            'abbr' => 'WV',
            'capital' => 'Charleston'
        ], [
            'name' => 'Wisconsin',
            'abbr' => 'WI',
            'capital' => 'Madison'
        ], [
            'name' => 'Wyoming',
            'abbr' => 'WY',
            'capital' => 'Cheyenne'
        ]];

        foreach ($countries as $row) {
            $country = new \App\Country();
            $country->name = $row['name'];
            $country->abbreviation = $row['abbr'];
            $country->save();

            $city = new \App\City();
            $city->name = $row['capital'];
            $city->country()->associate($country);
            $city->save();
        }

    }
}
