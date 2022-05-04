function increaseQuantity(ItemID) {
    whitebreadquantity = document.getElementById("itemm2");
    wheatbreadquantity = document.getElementById("itemm3");
    whitebunsquantity = document.getElementById("itemm4");
    wheatbunsquantity = document.getElementById("itemm5");
    flatbreadquantity = document.getElementById("itemm6");
    frenchbreadquantity = document.getElementById("itemm7");
    switch (ItemID) {
        case 2:
            whitebreadquantity.value++;
            break;
        case 3:
            wheatbreadquantity.value++;
            break;
        case 4:
            whitebunsquantity.value++;
            break;
        case 5:
            wheatbunsquantity.value++;
            break;
        case 6:
            flatbreadquantity.value++;
            break;
        case 7:
            frenchbreadquantity.value++;
            break;
    }
    setPrices();
}
function setPrices() {
    whitebreadprice = document.getElementById("price2");
    wheatbreadprice = document.getElementById("price3");
    whitebunsprice = document.getElementById("price4");
    wheatbunsprice = document.getElementById("price5");
    flatbreadprice = document.getElementById("price6");
    frenchbreadprice = document.getElementById("price7");
    totalprice = document.getElementById("totalprice");

    whitebreadunitprice = 4.0;
    wheatbreadunitprice = 4.5;
    whitebunsunitprice = 3.75;
    wheatbunsunitprice = 3.75;
    flatbreadunitprice = 3.0;
    frenchbreadunitprice = 3.75;

    whitebreadquantity = document.getElementById("itemm2").value;
    wheatbreadquantity = document.getElementById("itemm3").value;
    whitebunsquantity = document.getElementById("itemm4").value;
    wheatbunsquantity = document.getElementById("itemm5").value;
    flatbreadquantity = document.getElementById("itemm6").value;
    frenchbreadquantity = document.getElementById("itemm7").value;

    whitebreadprice.innerHTML =
        "$" +
        (whitebreadunitprice * whitebreadquantity).toLocaleString("en-US", {
            minimumFractionDigits: 2,
        });
    wheatbreadprice.innerHTML =
        "$" +
        (wheatbreadunitprice * wheatbreadquantity).toLocaleString("en-US", {
            minimumFractionDigits: 2,
        });
    whitebunsprice.innerHTML =
        "$" +
        (whitebunsunitprice * whitebunsquantity).toLocaleString("en-US", {
            minimumFractionDigits: 2,
        });
    wheatbunsprice.innerHTML =
        "$" +
        (wheatbunsunitprice * wheatbunsquantity).toLocaleString("en-US", {
            minimumFractionDigits: 2,
        });
    flatbreadprice.innerHTML =
        "$" +
        (flatbreadunitprice * flatbreadquantity).toLocaleString("en-US", {
            minimumFractionDigits: 2,
        });
    frenchbreadprice.innerHTML =
        "$" +
        (frenchbreadunitprice * frenchbreadquantity).toLocaleString("en-US", {
            minimumFractionDigits: 2,
        });

    document.getElementById("orderTotal").value =
        whitebreadunitprice * whitebreadquantity +
        wheatbreadunitprice * wheatbreadquantity +
        whitebunsunitprice * whitebunsquantity +
        wheatbunsunitprice * wheatbunsquantity +
        flatbreadunitprice * flatbreadquantity +
        frenchbreadunitprice * frenchbreadquantity;
}
function resetQuantities() {
    document.getElementById("itemm2").value = 0;
    document.getElementById("itemm3").value = 0;
    document.getElementById("itemm4").value = 0;
    document.getElementById("itemm5").value = 0;
    document.getElementById("itemm6").value = 0;
    document.getElementById("itemm7").value = 0;
    setPrices();
}
document.getElementById("itemm2").addEventListener("change", setPrices);
document.getElementById("itemm3").addEventListener("change", setPrices);
document.getElementById("itemm4").addEventListener("change", setPrices);
document.getElementById("itemm5").addEventListener("change", setPrices);
document.getElementById("itemm6").addEventListener("change", setPrices);
document.getElementById("itemm7").addEventListener("change", setPrices);
