<?php
$item_categories = array(
    'Food Items' => array(
        'Grains and Bakery Products' => array(
            '701111', '701311', '701312', '701321', '701322',
            '702111', '702112', '702211', '702212', '702213',
            '702221', '702411', '702421', '702611'
        ),
        'Meat, Poultry, and Seafood' => array(
            '703111', '703112', '703113', '703211', '703212', '703213',
            '703311', '703312', '703411', '703421', '703422', '703423',
            '703425', '703431', '703432', '703511', '703512', '703611',
            '703612', '703613', '704111', '704211', '704212', '704311',
            '704312', '704313', '704314', '704321', '704411', '704412',
            '704413', '704421', '705111', '705121', '705141', '705142',
            '706111', '706211', '706212', '706311', '707111'
        ),
        'Dairy and Eggs' => array(
            '708111', '708112', '709111', '709112', '709211', '709212',
            '709213', '710111', '710122', '710211', '710212', '710411'
        ),
        'Fruits' => array(
            '711111', '711211', '711311', '711312', '711411', '711412',
            '711413', '711414', '711415', '711416', '711417', '711418',
            '713111', '713311', '713312'
        ),
        'Vegetables' => array(
            '712111', '712112', '712211', '712311', '712401', '712402',
            '712403', '712404', '712405', '712406', '712407', '712408',
            '712409', '712410', '712411', '712412', '714111', '714221',
            '714231', '714232', '714233', '718631'
        ),
        'Processed Foods and Other Groceries' => array(
            '715111', '715211', '715212', '715311', '716111', '716113',
            '716114', '716116', '716121', '716141', '718311'
        )
    ),
    'Beverages' => array(
        'Non-Alcoholic Beverages' => array(
            '717111', '717112', '717113', '717114', '717311', '717312',
            '717324', '717325', '717326', '717327', '717411', '717412',
            '717413'
        ),
        'Alcoholic Beverages' => array(
            '720111', '720211', '720221', '720222', '720311'
        )
    ),
    'Fuels' => array(
        'Household Fuels' => array(
            '72511'
        ),
        'Automotive Fuels' => array(
            '74712', '74713', '74714', '74715', '74716', '74717', '7471A'
        )
    ),
    'Utilities' => array(
        'Gas' => array(
            '72601', '72611', '72620'
        ),
        'Electricity' => array(
            '72610', '72621'
        )
    ),
    'Aggregate Food Categories' => array(
        'FC1101', 'FC2101', 'FC3101', 'FC4101', 'FD2101', 'FD3101',
        'FD4101', 'FF1101', 'FJ1101', 'FJ4101', 'FL2101', 'FN1101',
        'FN1102', 'FS1101'
    )
);


$item_code_name_mapping = array(
    '701111' => 'Flour, white, all purpose, per lb. (453.6 gm)',
    '701311' => 'Rice, white, long grain, precooked (cost per pound/453.6 grams)',
    '701312' => 'Rice, white, long grain, uncooked, per lb. (453.6 gm)',
    '701321' => 'Spaghetti (cost per pound/453.6 grams)',
    '701322' => 'Spaghetti and macaroni, per lb. (453.6 gm)',
    '702111' => 'Bread, white, pan, per lb. (453.6 gm)',
    '702112' => 'Bread, French, per lb. (453.6 gm)',
    '702211' => 'Bread, rye, pan (cost per pound/453.6 grams)',
    '702212' => 'Bread, whole wheat, pan, per lb. (453.6 gm)',
    '702213' => 'Bread, wheat blend, pan (cost per pound/453.6 grams)',
    '702221' => 'Rolls, hamburger (cost per pound/453.6 grams)',
    '702411' => 'Cupcakes, chocolate (cost per pound/453.6 grams)',
    '702421' => 'Cookies, chocolate chip, per lb. (453.6 gm)',
    '702611' => 'Crackers, soda, salted, per lb. (453.6 gm)',
    '703111' => 'Ground chuck, 100% beef, per lb. (453.6 gm)',
    '703112' => 'Ground beef, 100% beef, per lb. (453.6 gm)',
    '703113' => 'Ground beef, lean and extra lean, per lb. (453.6 gm)',
    '703211' => 'Chuck roast, USDA Choice, bone-in, per lb. (453.6 gm)',
    '703212' => 'Chuck roast, graded and ungraded, excluding USDA Prime and Choice, per lb. (453.6 gm)',
    '703213' => 'Chuck roast, USDA Choice, boneless, per lb. (453.6 gm)',
    '703311' => 'Round roast, USDA Choice, boneless, per lb. (453.6 gm)',
    '703312' => 'Round roast, graded and ungraded, excluding USDA Prime and Choice, per lb. (453.6 gm)',
    '703411' => 'Rib roast, USDA Choice, bone-in, per lb. (453.6 gm)',
    '703421' => 'Steak, chuck, U.S. choice, bone-in (cost per pound/453.6 grams)',
    '703422' => 'Steak, T-Bone, USDA Choice, bone-in, per lb. (453.6 gm)',
    '703423' => 'Steak, porterhouse, U.S. choice, bone-in (cost per pound/453.6 grams)',
    '703425' => 'Steak, rib eye, USDA Choice, boneless, per lb. (453.6 gm)',
    '703431' => 'Short ribs, any primal source, bone-in, per lb. (453.6 gm)',
    '703432' => 'Beef for stew, boneless, per lb. (453.6 gm)',
    '703511' => 'Steak, round, USDA Choice, boneless, per lb. (453.6 gm)',
    '703512' => 'Steak, round, graded and ungraded, excluding USDA Prime and Choice, per lb. (453.6 gm)',
    '703611' => 'Steak, sirloin, USDA Choice, bone-in, per lb. (453.6 gm)',
    '703612' => 'Steak, sirloin, graded and ungraded, excluding USDA Prime and Choice, per lb. (453.6 gm)',
    '703613' => 'Steak, sirloin, USDA Choice, boneless, per lb. (453.6 gm)',
    '704111' => 'Bacon, sliced, per lb. (453.6 gm)',
    '704211' => 'Chops, center cut, bone-in, per lb. (453.6 gm)',
    '704212' => 'Chops, boneless, per lb. (453.6 gm)',
    '704311' => 'Ham, rump or shank half, bone-in, smoked,per lb. (453.6 gm)',
    '704312' => 'Ham, boneless, excluding canned, per lb. (453.6 gm)',
    '704313' => 'Ham, rump portion, bone-in, smoked (cost per pound/453.6 grams)',
    '704314' => 'Ham, shank portion, bone-in, smoked (cost per pound/453.6 grams)',
    '704321' => 'Ham, canned, 3 or 5 lbs, per lb. (453.6 gm)',
    '704411' => 'Pork shoulder roast, blade boston, bone-in (cost per pound/453.6 grams)',
    '704412' => 'Pork sirloin roast, bone-in (cost per pound/453.6 grams)',
    '704413' => 'Shoulder picnic, bone-in, smoked, per lb. (453.6 gm)',
    '704421' => 'Sausage, fresh, loose, per lb. (453.6 gm)',
    '705111' => 'Frankfurters, all meat or all beef, per lb. (453.6 gm)',
    '705121' => 'Bologna, all beef or mixed, per lb. (453.6 gm)',
    '705141' => 'Beef liver (cost per pound/453.6 grams)',
    '705142' => 'Lamb and mutton, bone-in, per lb. (453.6 gm)',
    '706111' => 'Chicken, fresh, whole, per lb. (453.6 gm)',
    '706211' => 'Chicken breast, bone-in, per lb. (453.6 gm)',
    '706212' => 'Chicken legs, bone-in, per lb. (453.6 gm)',
    '706311' => 'Turkey, frozen, whole, per lb. (453.6 gm)',
    '707111' => 'Tuna, light, chunk, per lb. (453.6 gm)',
    '708111' => 'Eggs, grade A, large, per doz.',
    '708112' => 'Eggs, grade AA, large, per doz.',
    '709111' => 'Milk, fresh, whole, fortified, per 1/2 gal. (1.9 lit)',
    '709112' => 'Milk, fresh, whole, fortified, per gal. (3.8 lit)',
    '709211' => 'Milk, fresh, skim (cost per one-half gallon/1.9 liters)',
    '709212' => 'Milk, fresh, low fat, per 1/2 gal. (1.9 lit)',
    '709213' => 'Milk, fresh, low fat, per gal. (3.8 lit)',
    '710111' => 'Butter, salted, grade AA, stick, per lb. (453.6 gm)',
    '710122' => 'Yogurt, natural, fruit flavored, per 8 oz. (226.8 gm)',
    '710211' => 'American processed cheese, per lb. (453.6 gm)',
    '710212' => 'Cheddar cheese, natural, per lb. (453.6 gm)',
    '710411' => 'Ice cream, prepackaged, bulk, regular, per 1/2 gal. (1.9 lit)',
    '711111' => 'Apples, Red Delicious, per lb. (453.6 gm)',
    '711211' => 'Bananas, per lb. (453.6 gm)',
    '711311' => 'Oranges, Navel, per lb. (453.6 gm)',
    '711312' => 'Oranges, Valencia, per lb. (453.6 gm)',
    '711411' => 'Grapefruit, per lb. (453.6 gm)',
    '711412' => 'Lemons, per lb. (453.6 gm)',
    '711413' => 'Pears, Anjou, per lb. (453.6 gm)',
    '711414' => 'Peaches, per lb. (453.6 gm)',
    '711415' => 'Strawberries, dry pint, per 12 oz. (340.2 gm)',
    '711416' => 'Grapes, Emperor or Tokay (cost per pound/453.6 grams)',
    '711417' => 'Grapes, Thompson Seedless, per lb. (453.6 gm)',
    '711418' => 'Cherries, per lb. (453.6 gm)',
    '712111' => 'Potatoes, white (cost per pound/453.6 grams)',
    '712112' => 'Potatoes, white, per lb. (453.6 gm)',
    '712211' => 'Lettuce, iceberg, per lb. (453.6 gm)',
    '712311' => 'Tomatoes, field grown, per lb. (453.6 gm)',
    '712401' => 'Cabbage, per lb. (453.6 gm)',
    '712402' => 'Celery, per lb. (453.6 gm)',
    '712403' => 'Carrots, short trimmed and topped, per lb. (453.6 gm)',
    '712404' => 'Onions, dry yellow, per lb. (453.6 gm)',
    '712405' => 'Onions, green scallions (cost per pound/453.6 grams)',
    '712406' => 'Peppers, sweet, per lb. (453.6 gm)',
    '712407' => 'Corn on the cob, per lb. (453.6 gm)',
    '712408' => 'Radishes (cost per pound/453.6 grams)',
    '712409' => 'Cucumbers, per lb. (453.6 gm)',
    '712410' => 'Beans, green, snap (cost per pound/453.6 grams)',
    '712411' => 'Mushrooms (cost per pound/453.6 grams)',
    '712412' => 'Broccoli, per lb. (453.6 gm)',
    '713111' => 'Orange juice, frozen concentrate, 12 oz. can, per 16 oz. (473.2 ml)',
    '713311' => 'Apple Sauce, any variety, all sizes, per lb. (453.6 gm)',
    '713312' => 'Peaches, any variety, all sizes, per lb. (453.6 gm)',
    '714111' => 'Potatoes, frozen, French fried, per lb. (453.6 gm)',
    '714221' => 'Corn, canned, any style, all sizes, per lb. (453.6 gm)',
    '714231' => 'Tomatoes, canned, whole, per lb. (453.6 gm)',
    '714232' => 'Tomatoes, canned, any type, all sizes,  per lb. (453.6 gm)',
    '714233' => 'Beans, dried, any type, all sizes, per lb. (453.6 gm)',
    '715111' => 'Hard candy, solid (cost per pound/453.6 grams)',
    '715211' => 'Sugar, white, all sizes, per lb. (453.6 gm)',
    '715212' => 'Sugar, white, 33-80 oz. pkg, per lb. (453.6 gm)',
    '715311' => 'Jelly (cost per pound/453.6 grams)',
    '716111' => 'Margarine, vegetable oil blends, stick (cost per pound/453.6 grams)',
    '716113' => 'Margarine, vegetable oil blends, soft, tubs (cost per pound/453.6 grams)',
    '716114' => 'Margarine, stick, per lb. (453.6 gm)',
    '716116' => 'Margarine, soft, tubs, per lb. (453.6 gm)',
    '716121' => 'Shortening, vegetable oil blends, per lb. (453.6 gm)',
    '716141' => 'Peanut butter, creamy, all sizes, per lb. (453.6 gm)',
    '717111' => 'Cola, non-diet, return bottles, 6 or 8 pack (cost per 16 ounces/473.2 ml)',
    '717112' => 'Cola, non diet, return bottles, 24-40 ounce (cost per 16 ounces/473.2 ml)',
    '717113' => 'Cola, nondiet, cans, 72 oz. 6 pk., per 16 oz. (473.2 ml)',
    '717114' => 'Cola, nondiet, per 2 liters (67.6 oz)',
    '717311' => 'Coffee, 100%, ground roast, all sizes, per lb. (453.6 gm)',
    '717312' => 'Coffee, 100%, ground roast, 13.1-20 oz. can, per lb. (453.6 gm)',
    '717324' => 'Coffee, instant, plain, regular, 6.1-14 ounce (cost per 16 ounces/453.6 grams)',
    '717325' => 'Coffee, freeze dried, regular, all sizes (cost per 16 ounces/453.6 grams)',
    '717326' => 'Coffee, freeze dried, decaf., all sizes (cost per 16 ounces/453.6 grams)',
    '717327' => 'Coffee, instant, plain, regular, all sizes, per lb. (453.6 gm)',
    '717411' => 'Coffee, instant, plain, 9.1-14 ounce (cost per 16 ounces/453.6 grams)',
    '717412' => 'Coffee, instant, plain, 3.1-6 ounce (cost per 16 ounces/453.6 grams)',
    '717413' => 'Coffee, freeze dried, plain, 3.1-9 ounce (cost per 16 ounces/453.6 grams)',
    '718311' => 'Potato chips, per 16 oz.',
    '718631' => 'Pork and beans, canned (cost per 16 ounces/453.6 grams)',
    '720111' => 'Malt beverages, all types, all sizes, any origin, per 16 oz. (473.2 ml)',
    '720211' => 'Bourbon whiskey, 375 ml-1.75 liter (cost per 25.4 ounces/750 ml)',
    '720221' => 'Vodka, domestic, 375 ml-1.75 liter (cost per 25.4 ounces/750 ml)',
    '720222' => 'Vodka, all types, all sizes, any origin, per 1 liter (33.8 oz)',
    '720311' => 'Wine, red and white table, all sizes, any origin, per 1 liter (33.8 oz)',
    '72511' => 'Fuel oil #2 per gallon (3.785 liters)',
    '72601' => 'Utility (piped) gas - 40 therms',
    '72610' => 'Electricity per KWH',
    '72611' => 'Utility (piped) gas - 100 therms',
    '72620' => 'Utility (piped) gas per therm',
    '72621' => 'Electricity per 500 KWH',
    '74712' => 'Gasoline, leaded regular (cost per gallon/3.8 liters)',
    '74713' => 'Gasoline, leaded premium (cost per gallon/3.8 liters)',
    '74714' => 'Gasoline, unleaded regular, per gallon/3.785 liters',
    '74715' => 'Gasoline, unleaded midgrade, per gallon/3.785 liters',
    '74716' => 'Gasoline, unleaded premium, per gallon/3.785 liters',
    '74717' => 'Automotive diesel fuel, per gallon/3.785 liters',
    '7471A' => 'Gasoline, all types, per gallon/3.785 liters',
    'FC1101' => 'All uncooked ground beef, per lb. (453.6 gm)',
    'FC2101' => 'All Uncooked Beef Roasts, per lb. (453.6 gm)',
    'FC3101' => 'All Uncooked Beef Steaks, per lb. (453.6 gm)',
    'FC4101' => 'All Uncooked Other Beef (Excluding Veal), per lb. (453.6 gm)',
    'FD2101' => 'All Ham (Excluding Canned Ham and Luncheon Slices), per lb. (453.6 gm)',
    'FD3101' => 'All Pork Chops, per lb. (453.6 gm)',
    'FD4101' => 'All Other Pork (Excluding Canned Ham and Luncheon Slices), per lb. (453.6 gm)',
    'FF1101' => 'Chicken breast, boneless, per lb. (453.6 gm)',
    'FJ1101' => 'Milk, fresh, low-fat, reduced fat, skim, per gal. (3.8 lit)',
    'FJ4101' => 'Yogurt, per 8 oz. (226.8 gm)',
    'FL2101' => 'Lettuce, romaine, per lb. (453.6 gm)',
    'FN1101' => 'All soft drinks, per 2 liters (67.6 oz)',
    'FN1102' => 'All soft drinks, 12 pk, 12 oz., cans, per 12 oz. (354.9 ml)',
    'FS1101' => 'Butter, stick, per lb. (453.6 gm)'
);

// CPI Series ID to Description Mapping
$ap_item_mapping = array(
    'APU0000701111' => 'Flour and prepared flour mixes',
    'APU0000702111' => 'Breakfast cereal',
    'APU0000703111' => 'Rice, pasta, cornmeal',
    'APU0000704111' => 'Bread',
    'APU0000705111' => 'Fresh biscuits, rolls, muffins',
    'APU0000706111' => 'Cakes, cupcakes, and cookies',
    'APU0000707111' => 'Other bakery products',
    'APU0000711111' => 'Uncooked ground beef',
    'APU0000712111' => 'Uncooked beef roasts',
    'APU0000713111' => 'Uncooked beef steaks',
    'APU0000714111' => 'Uncooked other beef and veal',
    'APU0000721111' => 'Bacon, breakfast sausage, and related products',
    'APU0000722111' => 'Ham',
    'APU0000723111' => 'Pork chops',
    'APU0000724111' => 'Other pork including roasts, steaks, and ribs',
    'APU0000731111' => 'Chicken',
    'APU0000732111' => 'Other uncooked poultry including turkey',
    'APU0000741111' => 'Fish and seafood',
    'APU0000742111' => 'Eggs',
    'APU0000751111' => 'Milk',
    'APU0000752111' => 'Cheese and related products',
    'APU0000753111' => 'Ice cream and related products',
    'APU0000754111' => 'Other dairy and related products',
    'APU0000761111' => 'Apples',
    'APU0000762111' => 'Bananas',
    'APU0000763111' => 'Citrus fruits',
    'APU0000764111' => 'Other fresh fruits',
    'APU0000771111' => 'Potatoes',
    'APU0000772111' => 'Lettuce',
    'APU0000773111' => 'Tomatoes',
    'APU0000774111' => 'Other fresh vegetables'
);

function generateApItemMapping($item_code_name_mapping = null) {
    $ap_item_mapping = [];
    
    if ($item_code_name_mapping === null) {
        global $item_code_name_mapping;
    }
    
    if (isset($item_code_name_mapping) && is_array($item_code_name_mapping)) {
        foreach ($item_code_name_mapping as $item_code => $description) {
            if (preg_match('/^[A-Z]{2}\d{4}$/', $item_code)) {
                $series_id = 'APU0000' . $item_code;
            } elseif (strlen($item_code) == 6 && ctype_digit($item_code)) {
                $series_id = 'APU0000' . $item_code;
            } elseif (strlen($item_code) == 5 && ctype_digit($item_code)) {
                $series_id = 'APU0000' . $item_code . '1';
            } elseif ($item_code === '7471A') {
                $series_id = 'APU00007471A';
            } else {
                continue;
            }
            $ap_item_mapping[$series_id] = $description ?: 'Unknown';
        }
    }
    
    return $ap_item_mapping;
}
?> 