

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Base de données : `REDGO`
-- CREATE DATABASE [IF NOT EXISTS] REDGO;
-- --------------------------------------------------------
--
-- Structure de la table `VENTE_ALL`
--
CREATE TABLE IF NOT EXISTS `VENTE_ALL`(
		`SITE` [nvarchar](5) NULL,
        `SITE_REGROUP` [nvarchar](5) NULL,
        `CODE_REPRESANTANT` [nvarchar](15) NULL,
        `NOM_REPRESANTANT` [nvarchar](35) NULL,
        `CODE_SUPERVISEUR` [nvarchar](15) NULL,
        `NOM_Superviseur` [nvarchar](35) NULL,
        `TYPE_FAC` [nvarchar](5) NULL,
        `TYPE_PIECE`[varchar](11) NULL,
        `MOIS_RESTOURNE` [int] NULL,
        `NUM_FACTURE` [nvarchar](20) NULL,
        `FACTURE_CORRES` [nvarchar](60) NULL,
        `COD_ART` [nvarchar](20) NULL,
        `DES_ART`[nvarchar](50) NULL,
        `COD_ART_REGROUP` [nvarchar](20) NULL,
        `DES_ART_REGROUP` [nvarchar](50) NULL,
        `UNIT` [nvarchar](3) NULL,
        `FAMILLE` [varchar](10) NULL,
        `SOUS_FAMILLE` [varchar](25) NULL,
        `ACTIVITE` [nvarchar](20) NULL,
	    `SOUS_ACTIVITE_HENKEL` [varchar](9) NULL,
        `SOUS_ACTIVITE` [varchar](50) NULL,
        `REGION` [nvarchar](20) NULL,
        `CLIENT_FAC` [nvarchar](15) NULL,
        `NOM_CLIENT_FAC` [nvarchar](35) NULL,
        `CLIENT_LIV` [nvarchar](15) NULL,
        `NOM_CLIENT_LIV` [nvarchar](35) NULL,
        `NUM_LIV` [nvarchar](20) NULL,
        `NUM_RETOUR` [nvarchar](20) NULL,
        `COD_CLIENT_CMD` [nvarchar](15) NULL,
        `COD_ADR` [nvarchar](5) NULL,
        `DES_ADR` [nvarchar](204) NULL,
        `TYP` [nvarchar](5) NULL,
        `JOUR` [int] NULL,
        `MOIS` [int] NULL,
        `ANNEE` [int] NULL,
        `DATE` [datetime] NULL,
        `Qte_Kg` [numeric](38, 7) NULL,
        `Qte_UN` [numeric](38, 13) NULL,
        `PRIX_UNITAIRE_HT` [numeric](19, 5) NULL,
        `REMISE` [numeric](19, 5) NULL,
        `CA_HT` [numeric](38, 6) NULL,
        `CA_TTC` [numeric](38, 13) NULL,
        `MODALITE_PAYEMENT` [nvarchar](15) NULL,
        `OBJ_CA`[numeric](38, 6) NULL,
        `OBJ_SOUHAITE` [numeric](38, 6) NULL,
        `CMD_NL` [numeric](38, 6) NULL,
        `CMD_LNF`[numeric](38, 6) NULL,
        `OBJ_CL` [numeric](38, 6) NULL,
        `OBJ_CL_SKU` [numeric](38, 6) NULL,
        `NB_CMD_NL` [numeric](38, 6) NULL,
        `NB_CMD_LNF` [numeric](38, 6) NULL,
        `QTE_STK` [numeric](28, 13) NULL,
        `UN_STOCK` [nvarchar](3) NULL,
        `PRIX_HT_STK` [numeric](19, 5) NULL,
        `REMISE_STK` [numeric](19, 5) NULL,
        `MT_HT_STK` [numeric](38, 6) NULL,
        `QTE_CMD_NL` [numeric](38, 6) NULL,
        `QTE_CMD_LNF`[numeric](38, 6) NULL,
        `OBJ_QTE_CL_ART` [numeric](38, 6) NULL,
        `OBJ_CA_CL_ART` [numeric](38, 6) NULL,
        `OBJ_CA_REP_FAM` [numeric](38, 6) NULL,
        `UN_CAR` [numeric](38, 6) NULL
) ON [PRIMARY]  DEFAULT CHARSET=redgo;
INSERT INTO `VENTE_ALL`(`REGION`,`CA_HT`,`OBJ_CA`,`QTE_STK`) VALUES
('NABEUL',233522.590,754000,12350),
('TUNIS',518284.058,1539000,166400),
('SFAX',700432.064,538000,220130);

