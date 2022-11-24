var year = 1805
$.ajax({
    method: 'GET',
    url: `https://api.api-ninjas.com/v1/historicalevents?year=${year}`,
    headers: { 'X-Api-Key': 'eR3VDpbLcqcCOXn13DKSmQ==jJFgr2OWbq9Kb8AC'},
    contentType: 'application/json',
    success: function(result) {
        console.log(result);
    },
    error: function ajaxError(jqXHR) {
        console.error('Error: ', jqXHR.responseText);
    }
});