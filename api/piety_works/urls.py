from rest_framework import routers
from .views import PietWorkViewSet

piet_router = routers.DefaultRouter()
piet_router.register(r'piedade', PietWorkViewSet)