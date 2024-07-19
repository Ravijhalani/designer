
document.addEventListener('DOMContentLoaded', function () {
    const mobileInput = document.getElementById('MobileNumber');
    const countryCode = '+91';
    const maxDigits = 10;

    // Prepend +91 to the input field value if it's empty
    mobileInput.addEventListener('focus', function () {
        if (!mobileInput.value.startsWith(countryCode)) {
            mobileInput.value = countryCode;
        }
    });

    // Ensure the +91 prefix remains in place and limit input to 10 digits
    mobileInput.addEventListener('input', function () {
        let value = mobileInput.value;

        // Remove any non-digit characters after the country code
        value = value.replace(/[^0-9+]/g, '');
        
        // Limit to maxDigits after the country code
        if (value.startsWith(countryCode)) {
            const numberPart = value.slice(countryCode.length).substring(0, maxDigits);
            mobileInput.value = countryCode + numberPart;
        } else {
            mobileInput.value = countryCode;
        }

        // Set the cursor position after the country code
        const currentPos = mobileInput.selectionStart;
        if (currentPos < countryCode.length) {
            mobileInput.setSelectionRange(countryCode.length, countryCode.length);
        }
    });

    // Prevent user from deleting the +91 prefix
    mobileInput.addEventListener('keydown', function (e) {
        const cursorPosition = mobileInput.selectionStart;
        if (cursorPosition <= countryCode.length && (e.key === 'Backspace' || e.key === 'Delete')) {
            e.preventDefault();
        }
    });
});