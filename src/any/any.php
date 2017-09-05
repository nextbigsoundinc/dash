<?php

namespace Dash;

/**
 * Checks whether `$predicate` returns truthy for any item in `$iterable`.
 *
 * Iteration will stop at the first truthy return value.
 *
 * @category Iterable
 * @param iterable|stdClass $iterable
 * @param callable $predicate (optional) Invoked with `($value, $key, $iterable)` for each element in `$iterable`
 * @return boolean true if `$predicate` returns truthy for any item in `$iterable`
 *
 * @see some
 *
 * @example
	Dash\any([1, 2, 3], 'Dash\isEven');
	// === true

	Dash\any([1, 2, 3], function ($n) { return $n > 5; });
	// === false

	Dash\any([], 'Dash\isOdd');
	// === false

	Dash\any((object) ['a' => 1, 'b' => 2, 'c' => 3], 'Dash\isEven');
	// === true
 *
 * @example With the default predicate
	Dash\any([false, true, true]);
	// === true

	Dash\any([false, false, false]);
	// === false
 */
function any($iterable, $predicate = 'Dash\identity')
{
	assertType($iterable, ['iterable', 'stdClass'], __FUNCTION__);

	foreach ($iterable as $key => $value) {
		if (call_user_func($predicate, $value, $key, $iterable)) {
			return true;
		}
	}

	return false;
}

/**
 * @codingStandardsIgnoreStart
 */
function _any(/* predicate, iterable */)
{
	return currify('Dash\any', func_get_args());
}

/**
 * @codingStandardsIgnoreStart
 */
function some()
{
	return call_user_func_array('Dash\any', func_get_args());
}

/**
 * @codingStandardsIgnoreStart
 */
function _some(/* predicate, iterable */)
{
	return currify('Dash\any', func_get_args());
}
