<?php
namespace Geo\Service\OpenStreetMap;

require_once dirname(__FILE__) . '/../../../../../lib/Geo/Location.php';
require_once dirname(__FILE__) . '/../../../../../lib/Geo/Service.php';
require_once dirname(__FILE__) . '/../../../../../lib/Geo/Service/OpenStreetMap/Nominatim.php';

class NominatimTest extends \PHPUnit_Framework_TestCase
{
  public function setUp()
  {
    $this->service = new Nominatim;
  }

  public function testSearch()
  {
    $this->service->search('Milano');
    $results = $this->service->getResults();

    $this->assertEquals('1', count($results));

    $this->assertInstanceOf('\Geo\Location', $results['0']);
    $this->assertEquals('45.461305', number_format($results['0']->getLatitude(), 6));
    $this->assertEquals('9.122938', number_format($results['0']->getLongitude(), 6));
  }
}