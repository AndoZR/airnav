books = [
  "The Little Prince",
  "The Old Man and the Sea",
  "The Little Mermaid",
  "Beauty and the Beast",
  "The Last Leaf",
]
for book in books: # iterasi semua buku
  key = sum(map(ord,book))
  print(key%8)