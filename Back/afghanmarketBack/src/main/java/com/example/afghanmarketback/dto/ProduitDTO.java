package com.example.afghanmarketback.dto;

import lombok.Data;

@Data
public class ProduitDTO {
    String nom;
    String marque;
    String categorie;
    String poids;
    double prix;
    String provenance;
    String image;
}
