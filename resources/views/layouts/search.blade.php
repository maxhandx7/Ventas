<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script>
    (function($) {
        'use strict';
        var substringMatcher = function(strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                var substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                for (var i = 0; i < strs.length; i++) {
                    if (substrRegex.test(strs[i])) {
                        matches.push(strs[i]);
                    }
                }

                cb(matches);
            };
        };


        var providersb = <?php echo json_encode($providersb); ?>;
        var productsb = <?php echo json_encode($productsb); ?>;
        var clientsb = <?php echo json_encode($clientsb); ?>;
        var usersb = <?php echo json_encode($usersb); ?>;

        var combinedDatas = Object.assign({}, providersb, productsb, clientsb, usersb);

        var namesArray = Object.values(combinedDatas).map(function(item) {
            return item.name;
        });

        var states = namesArray;

        $('#the-basics .typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'states',
            source: substringMatcher(states)
        });
        // constructs the suggestion engine
        var states = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            // `states` is an array of state names defined in "The Basics"
            local: states
        });

        $('#bloodhound .typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'states',
            source: states
        });
    })(jQuery);
</script>