$(function() {
    // DateTime
    jQuery.validator.addMethod("datetime", function(value, element) {
        return this.optional(element) || /^(([0-2]?\d)|([3][01]))\/[0,1]?\d\/((199\d)|([2-9]\d{3}))\s(00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9])$/.test(value);
    }, "Please enter a date in the format DD/MM/YYYY HH:mm");

    // AlphaNumericDash
    jQuery.validator.addMethod("alphanumdash", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9-]+$/i.test(value);
    }, "Please enter a valid alphanumeric with dash value.");

    // AlphaDash
    jQuery.validator.addMethod("alphadash", function(value, element) {
        return this.optional(element) || /^[a-zA-Z-]+$/i.test(value);
    }, "Please enter a valid alpha with dash value.");

    // CurencyIDR
    jQuery.validator.addMethod("currencyIDR", function(value, element) {
        return this.optional(element) || /^\Rp?(.[0-9]{1,3}.([0-9]{3}.)*[0-9]{3}|[0-9]+)(,[0-9][0-9])?$/.test(value);
    }, "Please enter a valid format currency (Rp.1.000.000,00)");
});