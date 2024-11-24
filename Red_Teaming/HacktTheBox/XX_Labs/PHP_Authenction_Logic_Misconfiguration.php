<?php

// Simulate a request object and JSON payload for testing
function request() {
    return new class {
        public function getJSON($assoc = false) {
            // Example JSON payload: {"test":"test"}
            $jsonPayload = '{"test":"test"}';
            return json_decode($jsonPayload, $assoc);
        }
    };
}

// Simulate the $this->respond() method for testing
function respond($message, $code) {
    return json_encode(["message" => $message, "code" => $code]);
}

// The problematic code
$json_data = request()->getJSON(true);

// Problematic condition with incorrect logic
if (!count($json_data) == 2) {
    // This will not behave as intended due to operator precedence
    echo respond("Please provide username and password", 404);
} else {
    echo respond("Valid input received", 200);
}

// Corrected code
$json_data = request()->getJSON(true);

// Correct condition to check if the count of keys is not equal to 2
if (count($json_data) !== 2) {
    // Properly handles the case where the JSON does not have exactly 2 keys
    echo respond("Please provide username and password", 404);
} else {
    echo respond("Valid input received", 200);
}
