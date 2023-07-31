function is_prime($num) {
    if ($num <= 1) {
        return false;
    }

    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }

    return true;
}

function get_prime_numbers($max) {
    $primes = array();

    for ($i = 2; $i <= $max; $i++) {
        if (is_prime($i)) {
            $primes[] = $i;
        }
    }

    return $primes;
}

// Example usage:
$max_value = 50; // Replace with your desired maximum value
$prime_numbers = get_prime_numbers($max_value);
print_r($prime_numbers);
