function order(item) {
    let itemDiv = item.parentElement;

    let pElement = itemDiv.querySelector(".name");

    let orderedDiv = document.querySelector("#orderForm");

    if (orderedDiv) {
        let cost = parseInt(itemDiv.querySelector(".cost").textContent.replace('€', ""));
        let name = pElement.textContent;
        let type = pElement.id;

        let newItem = createItem(name, cost, type);

        orderedDiv.appendChild(newItem);

        let totalElement = document.querySelector(".total");
        let totalInput = document.querySelector("input[name='total']");
        let oldCost = parseInt(totalElement.textContent.replace('€', ""));

        if (oldCost == 0) {
            totalElement.textContent = '€' + cost;
            totalInput.value = cost;
        } else {
            totalElement.textContent = '€' + (oldCost + cost);
            totalInput.value = oldCost + cost;
        }
    }
};

function removeItem(button) {
    let buttonDiv = button.parentElement;
    buttonDiv.parentElement.removeChild(buttonDiv);

    let totalInput = document.querySelector("input[name='total']");
    let totalElement = document.querySelector(".total");

    let cost = parseInt(buttonDiv.querySelector(".item").id);
    let oldCost = parseInt(totalElement.textContent.replace('€', ""));

    totalInput.value = oldCost - cost;
    totalElement.textContent = '€' + (oldCost - cost);
}

function createItem(name, cost, type) {
    let newItem = document.createElement("div");
    newItem.classList.add("item", "flex-row");

    let nameInput = document.createElement("input");
    nameInput.type = "hidden";
    nameInput.name = `items[${name}]`;
    nameInput.value = name;

    let typeInput = document.createElement("input");
    typeInput.type = "hidden";
    typeInput.name = `items[${name}][type]`; // Nested name for associating type with name
    typeInput.value = type;

    let newP = document.createElement("p");
    newP.classList.add("item");
    newP.id = cost;
    newP.textContent = name;

    let removeButton = document.createElement("button");
    removeButton.classList.add("small_button");
    removeButton.textContent = "-";
    removeButton.onclick = function () { removeItem(this); };

    newItem.appendChild(nameInput);
    newItem.appendChild(typeInput);
    newItem.appendChild(newP);
    newItem.appendChild(removeButton);

    return newItem;
}
