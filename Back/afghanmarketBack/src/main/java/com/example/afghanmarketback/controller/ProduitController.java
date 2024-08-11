package com.example.afghanmarketback.controller;

import com.example.afghanmarketback.Service.ProduitService;
import com.example.afghanmarketback.dao.Produit;
import com.example.afghanmarketback.dto.ProduitDTO;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.Setter;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@AllArgsConstructor
@Getter
@Setter
@RequestMapping("/produit")
public class ProduitController {
    @Autowired
    private final ProduitService produitService;
    @GetMapping("/All")
    public List<Produit> getAllChaniter() {
        return produitService.getAll();
    }

    @PostMapping("/create")
    public void createProduit(@RequestBody ProduitDTO produitDTO){
            produitService.createProduit(produitDTO);
    }


}
