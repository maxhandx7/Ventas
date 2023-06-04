DELIMITER //
CREATE TRIGGER `tr_updStockCompra` AFTER INSERT ON `purchase_details`
FOR EACH ROW BEGIN
    UPDATE products SET stock = stock + NEW.quantity;
END;
//
DELIMITER ;


DELIMITER //
CREATE TRIGGER `tr_updStockCompraAnular` AFTER UPDATE ON `purchases`
FOR EACH ROW BEGIN
    IF NEW.status = 'VALID' THEN
        UPDATE products p 
        JOIN purchase_details di ON di.product_id = p.id
        AND di.purchase_id = NEW.id
        SET p.stock = p.stock + di.quantity;
    ELSEIF NEW.status = 'CANCELED' THEN
        UPDATE products p 
        JOIN purchase_details di ON di.product_id = p.id
        AND di.purchase_id = NEW.id
        SET p.stock = p.stock - di.quantity;
    END IF;
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
IF NEW.status = 'VALID' THEN
        UPDATE products p 
        JOIN sale_details di ON di.product_id = p.id
        AND di.sale_id = NEW.id
        SET p.stock = p.stock - di.quantity;
    ELSEIF NEW.status = 'CANCELED' THEN
        UPDATE products p 
        JOIN sale_details di ON di.product_id = p.id
        AND di.sale_id = NEW.id
        SET p.stock = p.stock + di.quantity;
    END IF;
end;
// 
DELIMITER ;




