<?php
File path = "" // base path of the images

// load source images
BufferedImage image = ImageIO.read(new File(path, "jjordan_small.png"));
BufferedImage overlay = ImageIO.read(new File(path, "badge-ring.png"));

// create the new image, canvas size is the max. of both image sizes
int w = Math.max(image.getWidth(), overlay.getWidth());
int h = Math.max(image.getHeight(), overlay.getHeight());
BufferedImage combined = new BufferedImage(w, h, BufferedImage.TYPE_INT_ARGB);

// paint both images, preserving the alpha channels
Graphics g = combined.getGraphics();
g.drawImage(image, 0, 0, null);
g.drawImage(overlay, 0, 0, null);

// Save as new image
ImageIO.write(combined, "PNG", new File(path, "combined.png"));
?>