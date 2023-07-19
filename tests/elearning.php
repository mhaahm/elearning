<?php
test('one plus one does not equal three', function () {
    expect(1+1)->not->toBe(3);
});