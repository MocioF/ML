<?php

use Rubix\Engine\Transformers\Strategies\Strategy;
use Rubix\Engine\Transformers\Strategies\BlurryMedian;
use PHPUnit\Framework\TestCase;

class BlurryMedianTest extends TestCase
{
    protected $values;

    protected $strategy;

    public function setUp()
    {
        $this->values = [1, 2, 3, 4, 5];

        $this->strategy = new BlurryMedian();
    }

    public function test_build_blurry_mean_strategy()
    {
        $this->assertInstanceOf(BlurryMedian::class, $this->strategy);
        $this->assertInstanceOf(Strategy::class, $this->strategy);
    }

    public function test_guess_value()
    {
        $this->strategy->fit($this->values);

        $value = $this->strategy->guess();

        $this->assertThat($value,$this->logicalAnd($this->greaterThan(2.5), $this->lessThan(3.5)));
    }
}
