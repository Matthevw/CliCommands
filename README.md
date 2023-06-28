# CliCommands
By this exercise I learned how to create and use cutom CLI commands.
I created simple CLI commands and more advanced ones that can pass given argument and use it in the code.
I also connected some of my modules to be used (tested) by CLI commands.

## Example
For example, the "m2m:getproduct" command takes a "sku" argument and uses it to filter collection of products to find a product with the same SKU. 
If there's no such product, returns error message, otherwise it returns the product ID.