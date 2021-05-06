CREATE VIEW fav_artists_view AS

SELECT artist_favorites.id AS id, artist_favorites.user_id AS user_id, artist_favorites.artist_id AS artist_id, artist.name, artist.spotify_id, artist.image_url

FROM artist, artist_favorites
WHERE
	artist_favorites.artist_id = artist.id
ORDER BY artist.id;