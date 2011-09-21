 function cambiar() {
        var year = $('#dob_year').val();
        var month = $('#dob_month').val();
        if ((year != 0) && (month != 0)) {
            var lastday = 32 - new Date(year, month - 1, 32).getDate();
            var selected_day = $('#dob_day').val();

            // Change selected day if it is greater than the number of days in current month
            if (selected_day > lastday) {
                $('#dob_day  > option[value=' + selected_day + ']').attr('selected', false);
                $('#dob_day  > option[value=' + lastday + ']').attr('selected', true);
            }

            // Remove possibly offending days
            for (var i = lastday + 1; i < 32; i++) {
                $('#dob_day  > option[value=' + i + ']').remove();
            }

            // Add possibly missing days
            for (var i = 29; i < lastday + 1; i++) {
                if (!$('#dob_day  > option[value=' + i + ']').length) {
                    $('#dob_day').append($("<option></option>").attr("value", i).text(i));
                }
            }
        }
    }