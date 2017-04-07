-- Table: administrador.tbl_teatro

-- DROP TABLE administrador.tbl_teatro;

CREATE TABLE administrador.tbl_teatro
(
  id_teatro character varying NOT NULL,
  nombre_teatro character varying NOT NULL,
  id_zona_teatro character varying NOT NULL,
  CONSTRAINT id_teatro PRIMARY KEY (id_teatro),
  CONSTRAINT id_zona_teatro FOREIGN KEY (id_zona_teatro)
      REFERENCES administrador.tbl_zona_teatro (id_zona_teatro) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)

CREATE TABLE administrador.tbl_zona_teatro
(
  id_zona_teatro character varying NOT NULL,
  nombre_zona_teatro character varying NOT NULL,
  descripcion_zona_teatro character varying NOT NULL,
  CONSTRAINT id_zona_teatro PRIMARY KEY (id_zona_teatro)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE administrador.tbl_teatro
  OWNER TO postgres;
