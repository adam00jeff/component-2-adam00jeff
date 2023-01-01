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
        if (e.target.matches('button.delete-user')) {
            deleteUserByID(e.target.value);
        }
        if (e.target.matches('button.buy-product')) {
            buyProductByID(e.target.value);
        }

        /*if (e.target.matches('button.add-product')) {
            addNewProduct();
        }*/
    });
}

function  buyProductByID(id) {
    window.location= "/products/"+id;
}
function  getProductByID(id) {
    window.location= "/products/"+id;
}
function  updateProductByID(id) {
    window.location= "/products/"+id+"/edit";
}


async function  filterByProductType(id) {
if(id==0) window.location ="/products/"
else{
    try{
        const response = await axios.get('/filter',
            {params: {producttype:id}}
        );

        var filter = document.getElementById("productlist");
        filter.innerHTML = response.data;
        var pagination = document.getElementById("pagination");
        pagination.innerHTML = "<br><br>";

    }
    catch (error) {
        console.error(error);
    }
}
}
async function deleteProductByID(id) {
    try{
        const response = await axios.delete('/products/'+id);
        if(response.data.msg==='success') {
            alert('Successfully Deleted');
            window.location = '/products';
        }

    }
    catch (error) {
        console.error(error);
    }
}
async function deleteUserByID(id) {
    try{
        const response = await axios.delete('/users/'+id);
        if(response.data.msg==='success') {
            alert('Successfully Deleted');
            window.location = '/users';
        }

    }
    catch (error) {
        console.error(error);
    }
}
