<?php
namespace Geo\Service\GoogleMap;

require_once dirname(__FILE__) . '/../../../../../lib/Geo/Location.php';
require_once dirname(__FILE__) . '/../../../../../lib/Geo/Service.php';
require_once dirname(__FILE__) . '/../../../../../lib/Geo/Service/GoogleMap/GeoCode.php';

class GeoCodeTest extends \PHPUnit_Framework_TestCase
{
  public function setUp()
  {
    $this->service = new GeoCode;
  }

  public function testSearch()
  {
    $this->service->search('Milano');
    $results = $this->service->getResults();

    $this->assertEquals('1', count($results));

    $this->assertInstanceOf('\Geo\Location', $results['0']);
    $this->assertEquals('45.4636889', $results['0']->getLatitude());
    $this->assertEquals('9.1881408', $results['0']->getLongitude());
  }
}
