## Getting Started

### Setup 1

```
git clone git@github.com:Dastmalchi/mage-conversion-tracker.git
cd mage-conversion-tracker
zip -r ./Dastmalchi_ConversionTracker.zip ./app/
```

### Setup 2

Copy `Dastmalchi_ConversionTracker.zip` to web root.

### Setup 3

SSH into the webserver and `cd` into web root then run the following.

```
unzip ./Dastmalchi_ConversionTracker.zip
```

## Example Usage

```
// get order ID
var orderId = {{var order.getIncrementId()}};

// get grand total
var grandTotal = {{var order.getGrandTotal()}};

// get all items
var allItems = {{array order.getAllItems()}}

// get all visible items
var allVisibleItems = {{array order.getAllVisibleItems()}};

// get order data
var data = {{array order.getData()}};

console.log("The order ID is: " + orderId);
console.log("The order grand total is: " + grandTotal);
console.log('data');
console.log(JSON.stringify(data, null, 2));

for(var i = 0; i < allVisibleItems.length; i++) {
console.log(allVisibleItems[i].name);
}
```

## Google Adwords Example

![Adwords Example](https://www.evernote.com/shard/s506/sh/cc2f722b-02e6-4a97-89a1-1bc5a43ef2ae/9cd815d4e9f59d9035f9ca1d6b72a12a/deep/0/untitled---Textmaster_Textmaster-1.0.1.png)