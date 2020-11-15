const products = [
  {
    "id": 1,
    "sku": "FC-HDTV00000001",
    "manufacturer_id": 1,
    "name": "27\" HD Television",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "320.00",
    "sale_price": null,
    "units_available": 28,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 1,
      "name": "Acme",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 2,
    "sku": "FC-HDTV00000002",
    "manufacturer_id": 2,
    "name": "32\" HD Television",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "459.99",
    "sale_price": null,
    "units_available": 7,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 2,
      "name": "Soylent Industries",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 3,
    "sku": "FC-HDTV00000003",
    "manufacturer_id": 3,
    "name": "52\" HD Television",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "288.99",
    "sale_price": null,
    "units_available": 3,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 3,
      "name": "Virtucon",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 4,
    "sku": "FC-HDTV00000004",
    "manufacturer_id": 4,
    "name": "22\" HD Television",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "320.00",
    "sale_price": "290.00",
    "units_available": 28,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 4,
      "name": "Initech",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 5,
    "sku": "FC-HDTV00000005",
    "manufacturer_id": 5,
    "name": "32\" HD Television",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "459.99",
    "sale_price": "400.00",
    "units_available": 7,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 5,
      "name": "Techniholdings",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 6,
    "sku": "FC-HDTV00000006",
    "manufacturer_id": 6,
    "name": "27\" HD Television",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "320.00",
    "sale_price": null,
    "units_available": 28,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 6,
      "name": "Rekall",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 7,
    "sku": "FC-HDTV00000007",
    "manufacturer_id": 6,
    "name": "32\" HD Television",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "459.99",
    "sale_price": null,
    "units_available": 7,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 6,
      "name": "Rekall",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 8,
    "sku": "FC-HDTV00000008",
    "manufacturer_id": 4,
    "name": "52\" HD Television",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "288.99",
    "sale_price": null,
    "units_available": 3,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 4,
      "name": "Initech",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 9,
    "sku": "FC-HDTV00000009",
    "manufacturer_id": 3,
    "name": "22\" HD Television",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "320.00",
    "sale_price": "290.00",
    "units_available": 28,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 3,
      "name": "Virtucon",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 10,
    "sku": "FC-HDTV00000010",
    "manufacturer_id": 2,
    "name": "32\" HD Television",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "459.99",
    "sale_price": null,
    "units_available": 7,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 2,
      "name": "Soylent Industries",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 11,
    "sku": "FC-COMP00000001",
    "manufacturer_id": 6,
    "name": "HAL 9000",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "750.99",
    "sale_price": null,
    "units_available": 61,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 6,
      "name": "Rekall",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 12,
    "sku": "FC-COMP00000002",
    "manufacturer_id": 5,
    "name": "Bates 9000",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "1750.99",
    "sale_price": "1750.00",
    "units_available": 2,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 5,
      "name": "Techniholdings",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 13,
    "sku": "FC-COMP00000003",
    "manufacturer_id": 4,
    "name": "Vi",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "1250.99",
    "sale_price": null,
    "units_available": 8,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 4,
      "name": "Initech",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 14,
    "sku": "FC-COMP00000004",
    "manufacturer_id": 3,
    "name": "Gibson Server",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "27050.99",
    "sale_price": null,
    "units_available": 8,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 3,
      "name": "Virtucon",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 15,
    "sku": "FC-COMP00000005",
    "manufacturer_id": 2,
    "name": "ChiChi 3000",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "870.99",
    "sale_price": "800.00",
    "units_available": 8,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 2,
      "name": "Soylent Industries",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 16,
    "sku": "FC-COMP00000006",
    "manufacturer_id": 3,
    "name": "Huxley 600",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "999.99",
    "sale_price": null,
    "units_available": 61,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 3,
      "name": "Virtucon",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 17,
    "sku": "FC-COMP00000007",
    "manufacturer_id": 3,
    "name": "WOPR",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "1750.99",
    "sale_price": "1710.00",
    "units_available": 2,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 3,
      "name": "Virtucon",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 18,
    "sku": "FC-COMP00000008",
    "manufacturer_id": 3,
    "name": "MU-TH-R 182",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "1390.99",
    "sale_price": null,
    "units_available": 8,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 3,
      "name": "Virtucon",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 19,
    "sku": "FC-COMP00000009",
    "manufacturer_id": 2,
    "name": "V.I.K.I.",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "2050.99",
    "sale_price": null,
    "units_available": 8,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 2,
      "name": "Soylent Industries",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 20,
    "sku": "FC-COMP00000010",
    "manufacturer_id": 1,
    "name": "Project 2501",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "862.99",
    "sale_price": "800.00",
    "units_available": 8,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 1,
      "name": "Acme",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 21,
    "sku": "FC-MOBI00000001",
    "manufacturer_id": 1,
    "name": "X-DNA 2",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "645.99",
    "sale_price": "600.00",
    "units_available": 4,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 1,
      "name": "Acme",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 22,
    "sku": "FC-MOBI00000002",
    "manufacturer_id": 2,
    "name": "Eclipse",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "129.99",
    "sale_price": null,
    "units_available": 4,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 2,
      "name": "Soylent Industries",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 23,
    "sku": "FC-MOBI00000003",
    "manufacturer_id": 3,
    "name": "Universe X-71",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "422.99",
    "sale_price": null,
    "units_available": 4,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 3,
      "name": "Virtucon",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 24,
    "sku": "FC-MOBI00000004",
    "manufacturer_id": 4,
    "name": "Orion III",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "721.99",
    "sale_price": "699.99",
    "units_available": 4,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 4,
      "name": "Initech",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 25,
    "sku": "FC-MOBI00000005",
    "manufacturer_id": 5,
    "name": "Aries Ib",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "643.99",
    "sale_price": "619.99",
    "units_available": 4,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 5,
      "name": "Techniholdings",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 26,
    "sku": "FC-MOBI00000006",
    "manufacturer_id": 6,
    "name": "XD-1",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "3.00",
    "sale_price": null,
    "units_available": 4,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 6,
      "name": "Rekall",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 27,
    "sku": "FC-MOBI00000007",
    "manufacturer_id": 3,
    "name": "Axiom",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "400.99",
    "sale_price": null,
    "units_available": 12,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 3,
      "name": "Virtucon",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 28,
    "sku": "FC-MOBI00000008",
    "manufacturer_id": 3,
    "name": "T-16 Bullseye",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "734.99",
    "sale_price": "699.99",
    "units_available": 4,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 3,
      "name": "Virtucon",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 29,
    "sku": "FC-MOBI00000009",
    "manufacturer_id": 1,
    "name": "ETA-2 Actis",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "712.99",
    "sale_price": null,
    "units_available": 66,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 1,
      "name": "Acme",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  },
  {
    "id": 30,
    "sku": "FC-MOBI00000010",
    "manufacturer_id": 4,
    "name": "C-3PO",
    "short_desc": "Short description of product goes here.",
    "long_desc": "This is the long description of the product. This description appears on the product detail page.",
    "unit_price": "799.99",
    "sale_price": null,
    "units_available": 14,
    "active": 1,
    "created_at": "2020-11-15T19:02:33.000000Z",
    "updated_at": "2020-11-15T19:02:33.000000Z",
    "manufacturer": {
      "id": 4,
      "name": "Initech",
      "created_at": "2020-11-15T19:02:33.000000Z",
      "updated_at": "2020-11-15T19:02:33.000000Z"
    }
  }
];

export default products;