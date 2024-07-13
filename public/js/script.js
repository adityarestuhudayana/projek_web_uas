const menu = document.getElementById("menu");
const bar = document.getElementById("bar");
const sidebar = document.getElementById("sidebar");
bar.addEventListener("click", (e) => {
    e.preventDefault();
    if (sidebar.classList.contains("translate-x-[-100%]")) {
        sidebar.classList.replace("translate-x-[-100%]", "translate-x-0");
        bar.classList.replace("fa-bars", "fa-xmark");
    } else {
        bar.classList.replace("fa-xmark", "fa-bars");
        sidebar.classList.replace("translate-x-0", "translate-x-[-100%]");
    }
});

const searchBtn = document.getElementById("search-btn");
searchBtn.addEventListener("click", () => {
    if (searchBtn.classList.contains("fa-magnifying-glass")) {
        searchBtn.classList.replace("fa-magnifying-glass", "fa-xmark");
    } else {
        searchBtn.classList.replace("fa-xmark", "fa-magnifying-glass");
    }
});


// const deleteBtn = document.getElementById('delete')

function confirmDelete(e){
    e.preventDefault()

    Swal.fire({
        title: "Yakin ingin hapus?",
        text: "Data tidak dapat dikembalikan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yakin",
    }).then((result) => {
        if (result.isConfirmed) {
            e.target.submit()
            // Swal.fire({
            //     title: "Deleted!",
            //     text: "Your file has been deleted.",
            //     icon: "success",
            // });
        }
    });

}


const incrementBtn = document.getElementById('increment')
const decrementBtn = document.getElementById('decrement')
const amount = document.getElementById('order_amount')
const stock = document.getElementById('stock')

if(stock.innerText == 0) {
    incrementBtn.style.display ='none'
    amount.disabled = true
}


if(amount.value == 0) {
    decrementBtn.style.display = 'none'
} else {
    decrementBtn.style.display = 'block'
}

incrementBtn.addEventListener('click', () => {
    const amount = document.getElementById('order_amount')
    const amount2 = document.getElementById('order_amount_2')
    const stock = document.getElementById('stock')
    if(amount.value == stock.innerText - 1) {
        incrementBtn.style.display = 'none'
        amount.value++
        amount2.value = amount.value
    } else {
        decrementBtn.style.display = 'block'
        amount.value++
        amount2.value = amount.value
    }
    // if(amount.value == 9) {
    //     // incrementBtn.style.display = 'none'
    //     amount.value++
    // } else {
    //     amount.value++
    //     // decrementBtn.style.display = 'block'
    // }

})

decrementBtn.addEventListener('click', () => {
    const amount = document.getElementById('order_amount')
    const amount2 = document.getElementById('order_amount_2')
    const stock = document.getElementById('stock')

    if(amount.value - 1 == 0) {
        decrementBtn.style.display = 'none'
        amount.value--
        amount2.value = amount.value
    } else {
        incrementBtn.style.display = 'block'
        amount.value--
        amount2.value = amount.value
    }

    // if(amount.value - 1 == 0) {
    //     decrementBtn.style.display = 'none'
    //     amount.value--
    // } else {
    //     amount.value--
    //     incrementBtn.style.display = 'block'
    // }
})

function completeProductIdInput(e){
    const productId = e.target.childNodes[3].innerText
    console.log(productId)
    const productIdInput = document.getElementById('product_id_input')
    productIdInput.value = productId
}

function checkOrderId(e){
    e.preventDefault()
    const orderId = document.getElementById('order_id').innerText
    const form = document.getElementById('comment_form')
    const formUrl = form.setAttribute('action', '/orders/delete/' + orderId)
    form.submit()
}
