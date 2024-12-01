function resetForm(resetButton) {
    $(document).on('click', resetButton, function () {
        const form = $(this).closest('form')[0];
        form.reset();
    });
}

window.resetForm = resetForm;