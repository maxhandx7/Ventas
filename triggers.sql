DELIMITER // 
CREATE TRIGGER `tr_updStockCompra` AFTER INSERT ON `purchase_details`
FOR EACH ROW BEGIN
UPDATE products SET stock = stock + NEW.quantity
WHERE products.id = NEW.product_id;
END;
//
DELIMITER ;

DELIMITER // 
CREATE TRIGGER `tr_updStockCompraAnular` AFTER UPDATE ON `purchases`
FOR EACH ROW BEGIN
UPDATE products p
JOIN shopping_details di
ON di.products_id = p.id
AND di.purchase_date = NEW.id
set p.stock = p.stock - di.quantity;
END;    
//
DELIMITER ;

DELIMITER // 
CREATE TRIGGER `tr_updStockVenta` AFTER INSERT ON `sale_details`
FOR EACH ROW BEGIN
UPDATE products SET stock = stock - NEW.quantity
WHERE products.id = NEW.product_id;
END;
//
DELIMITER ;

DELIMITER // 
CREATE TRIGGER `tr_updStockVentaAnular` AFTER UPDATE ON `sales`
FOR EACH ROW BEGIN
UPDATE products p
JOIN sale_details dv
ON dv.products_id = p.id
AND dv.sale_id = NEW.id
set p.stock = p.stock + dv.quantity;
END;    
//
DELIMITER ;