#CFLAGS = `pkg-config --cflags opencv`
#LIBS = `pkg-config --libs opencv`


CFLAGS = -I/usr/include/opencv 
LIBS = -lopencv_core -lopencv_imgproc -lopencv_highgui -lopencv_ml -lopencv_video -lopencv_features2d -lopencv_calib3d -lopencv_objdetect -lopencv_contrib -lopencv_legacy -lopencv_flann

exmaple1 : example1.cpp
	g++ $(CFLAGS) $(LIBS) -o $@ $<
