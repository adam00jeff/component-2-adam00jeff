


window.onload = function() {
    document.addEventListener('change', e => {
        if (e.target.matches('select.select-box')) {
            filterByProductType(e.target.value);
        }
    });
    document.addEventListener('click', e => {
        if (e.target.matches('button.select-product')) {
            getProductByID(e.target.value);
        }
        if (e.target.matches('button.update-product')) {
            updateProductByID(e.target.value);
        }
        if (e.target.matches('button.delete-product')) {
            deleteProductByID(e.target.value);
        }
        /*if (e.target.matches('button.add-product')) {
            addNewProduct();
        }*/
    });
}

function  getProductByID(id) {
    window.location= "/products/"+id;
}
function  updateProductByID(id) {
    window.location= "/products/"+id+"/edit";
}


async function  filterByProductType(id) {

    try{
        const response = await axios.get('/search',
            {params: {producttype:id}}
        );

        var filter = document.getElementById("productlist");
        filter.innerHTML = response.data;

    }
    catch (error) {
        console.error(error);
    }
}

