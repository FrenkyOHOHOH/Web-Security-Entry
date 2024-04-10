function limitInputLength(inputField, maxLength) {
    if (inputField.value.length > maxLength) {
        alert("输入长度不能超过 " + maxLength + " 个字符！");
        inputField.value = inputField.value.slice(0, maxLength);
    }
}

function encryptAnswer() {
    var answer = document.getElementsByName('ans')[0].value;
    var encryptedAnswer = CryptoJS.SHA256(answer).toString();
    document.getElementsByName('ans')[0].value = encryptedAnswer;
    return true; // 允许表单提交
}