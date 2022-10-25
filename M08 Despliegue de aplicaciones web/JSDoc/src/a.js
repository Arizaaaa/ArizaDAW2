/**
 * @class Pen
 */
class Pen {
/**
 * Creates an instance of Pen.
 * @param {string} name
 * @param {string} color
 * @param {string} price
 * @memberof Pen
 */
constructor(name, color, price){
        this.name = name;
        this.color = color; 
        this.price = price;
    }
    /**
     * @memberof Pen
     */
    showPrice(){
        console.log(`Price of ${this.name} is ${this.price}`);
    }
}
const pen1 = new Pen("Marker", "Blue", "$3");
pen1.showPrice();
