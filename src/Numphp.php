<?php

/**
 * @author Girish Kapileswarapu
 */

namespace Girishk;

class Numphp
{
	public function mean($data = array())
	{
		if (count($data) == 0) {
			return 0;
		}

		return round(array_sum($data) / count($data), 2);
	}

	public function standardDeviation($data = array(), $sample = false)
	{
		$count = count($data);

		if ($count === 0) {
			return 0;
		}

		if ($sample && $count === 1) {
			return 0;
		}

		$mean = $this->mean($data);

		$carry = 0.0;

		foreach ($data as $val) {
			$d = ((double) $val) - $mean;
			$carry += $d * $d;
		};

		if ($sample) {
			--$count;
		}

		$standardDeviation = sqrt($carry / $count);

		return round($standardDeviation, 2);
	}

	public function zScore($data, $mean, $sd)
	{
		if ($sd == 0) {
			return 0;
		}

		return round((($data - $mean) / $sd), 2);
	}

	public function percentile($zScore)
	{
		$percentile = 0;
		if ($zScore < 0){
			$percentile = ((1 - $this->percentileErrorFunction($zScore / sqrt(2)))/2) * 100;
		} else {
			$percentile = ((1 + $this->percentileErrorFunction($zScore / sqrt(2)))/2) * 100;
		}

		if ($percentile < 1) {
			$percentile = 1;
		} else if ($percentile > 99) {
			$percentile = 99;
		}

		return round($percentile, 2);
	}

	private function percentileErrorFunction($absZScore)
	{
		$constant = (8*(M_PI - 3))/(3*M_PI*(4 - M_PI));
		$sqrZScore = $absZScore * $absZScore;

		$constantSqrZScore = $constant * $sqrZScore;
		$numerator = (4/M_PI) + $constantSqrZScore;
		$denominator = 1 + $constantSqrZScore;

		$innerExpression = (-$sqrZScore)*$numerator/$denominator;
		$sqrErrorValue = 1 - exp($innerExpression);

		return sqrt($sqrErrorValue);
	}
}
