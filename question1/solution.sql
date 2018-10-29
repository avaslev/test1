SELECT p.name, sum(l.tax), sum(c.tax)
FROM procedure p
 INNER JOIN lot l USING (procedure_id)
 INNER JOIN customer c USING (lot_id)
GROUP BY p.procedure_id
;