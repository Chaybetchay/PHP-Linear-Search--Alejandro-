<?php
// Filename: linear_search.php

/**
 * Linear Search Function
 * * This function iterates through an array sequentially to find a target value.
 * It compares each element with the target value until a match is found
 * or the end of the array is reached.
 * * Algorithm Steps:
 * 1. Start from the first element (index 0).
 * 2. Compare the current element with the target.
 * 3. If they match, return the current index.
 * 4. If they don't match, move to the next element.
 * 5. If the end of the array is reached without a match, return -1.
 * * @param array $array The list of items to search through.
 * @param mixed $target The value we are looking for.
 * @return int Returns the index if found, or -1 if not found.
 */
function linearSearch($array, $target) {
    $n = count($array);

    // Loop through every element in the array
    for ($i = 0; $i < $n; $i++) {
        // Compare current element with the target
        // We use '==' to allow loose comparison (e.g., string "25" matches int 25)
        if ($array[$i] == $target) {
            return $i; // Match found, return the index
        }
    }

    // If the loop finishes, the target was not in the array
    return -1;
}

// --- Main Execution ---

// Requirement: Create an array of at least 10 elements
$data = [15, 42, 8, 23, 4, 16, 99, 55, 7, 10, 31, 60];
$search_result = null;
$search_term = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_term = trim($_POST['target']);
    
    // Validate input is not empty
    if ($search_term !== "") {
        // Requirement: Use the specific function name linearSearch
        $index = linearSearch($data, $search_term);
        
        if ($index != -1) {
            $search_result = "Found";
            $found_index = $index;
        } else {
            $search_result = "Not Found";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Linear Search Implementation</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 500px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { border-bottom: 2px solid #333; padding-bottom: 10px; }
        .array-display { background: #eee; padding: 10px; border-radius: 4px; font-family: monospace; word-wrap: break-word; }
        input[type="text"] { padding: 8px; width: 70%; }
        button { padding: 8px 15px; background: #28a745; color: white; border: none; cursor: pointer; }
        button:hover { background: #218838; }
        .result-box { margin-top: 20px; padding: 15px; border-radius: 5px; }
        .success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

<div class="container">
    <h2>🔍 Linear Search</h2>
    
    <p><strong>Current Array (Index 0 - <?php echo count($data)-1; ?>):</strong></p>
    <div class="array-display">
        [<?php echo implode(', ', $data); ?>]
    </div>

    <br>

    <form method="POST" action="">
        <label for="target">Enter value to search:</label><br>
        <input type="text" name="target" id="target" value="<?php echo htmlspecialchars($search_term); ?>" required>
        <button type="submit">Search</button>
    </form>

    <?php if ($search_result === "Found"): ?>
        <div class="result-box success">
            <strong>Success!</strong> Value '<?php echo htmlspecialchars($search_term); ?>' found at index <strong><?php echo $found_index; ?></strong>.
        </div>
    <?php elseif ($search_result === "Not Found"): ?>
        <div class="result-box error">
            <strong>Not Found.</strong> The value '<?php echo htmlspecialchars($search_term); ?>' is not in the list.
        </div>
    <?php endif; ?>

</div>

</body>
</html>