from django.contrib import admin
from django.urls import path, include


from accounts.urls import accounts_router
from entities.urls import entity_router


urlpatterns = [
    path(r'api/v1/', include(accounts_router.urls)),
    path(r'api/v1/', include(entity_router.urls)),
    path('admin/', admin.site.urls),
    path('api/v1/', include('rest_auth.urls')),
]
