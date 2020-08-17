from django.shortcuts import render

class UserViewSet(viewsets.ModelViewSet):
    
    queryset = User.objects.all()
    serializer_class = UserSerializer