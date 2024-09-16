window.onload = function() {
    document.getElementById("download").addEventListener("click", () => {
        const invoice = this.document.getElementById("print-area");
        html2pdf().from(invoice).save();
});
};