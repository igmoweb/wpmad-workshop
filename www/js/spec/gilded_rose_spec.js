describe("Gilded Rose unit tests", function() {

  // Helper assertions
  // expect( result ).toEqual( $expression )
  // expect( result ).toBe( expression ) `===` comparison
  // expect( result ).toBeNull()
  // expect( result ).toContain( string )

  it("should foo", function() {
    const gildedRose = new Shop([ new Item("foo", 0, 0) ]);
    const items = gildedRose.updateQuality();
    expect(items[0].name).toEqual("fixme");
  });

});
