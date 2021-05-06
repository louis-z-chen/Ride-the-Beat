CREATE VIEW fav_playlists_view AS

SELECT playlist_favorites.id AS id, playlist_favorites.user_id AS user_id, playlist_favorites.playlist_id AS playlist_id, playlist.image_url, playlist.name, playlist.url, playlist.spotify_id

FROM playlist, playlist_favorites
WHERE
	playlist_favorites.playlist_id = playlist.id
ORDER BY playlist.id;